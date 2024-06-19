<?php
session_start();
require_once 'queryDatabase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $inn = htmlspecialchars(trim($_POST["inn"]));
    $name_org = htmlspecialchars(trim($_POST["name_org"]));
    $email = htmlspecialchars(trim($_POST["email"]));

    if (
        empty($fullname) || empty($phone) || empty($inn)
        || empty($name_org) || empty($email) ||
        strlen($fullname) > 240 || strlen($phone) > 20 || strlen($inn) > 12 || !is_numeric($inn)
    ) {
        $_SESSION['message'] = "Пожалуйста заполните все поля и убедитесь, что поля не превышают допустимых значений";
        header("Location: /main#order");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Пожалуйста введите правильный адрес электронной почты.";
        header("Location: /main#order");
        exit;
    }

    $query = "INSERT INTO orders (fullname, phone, inn, name_org, email) VALUES (:fullname, :phone, :inn, :name_org,  :email)";
    $params = array(
        ':fullname' => $fullname,
        ':phone' => $phone,
        ':inn' => $inn,
        ':name_org' => $name_org,
        ':email' => $email
    );
    $result = queryDatabase($query, $params);

    if ($result) {
        function sendToTelegram($fullname, $phone, $inn, $name_org, $email)
        {

            $token = "5295599443:AAEEmIShM04-mrCYWy9Jh-_rt-VXv5V-Cic";
            $chat_id = "-4246606812";
            $txt = 'Новая заявка с сайта' . "\n" . "\n";
            $arr = array(
                'ФИО: ' => $fullname,
                'Телефон: ' => $phone,
                'Инн: ' => $inn,
                'Название организации: ' => $name_org,
                'Почта: ' => $email,
            );

            foreach ($arr as $key => $value) {
                $txt .= "<b>" . $key . "</b> " . $value . "\n" . "\n";
            };

            $url = "https://api.telegram.org/bot{$token}/sendMessage";
            $data = array(
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $txt
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if ($result) {
                return true;
            } else {
                return false;
            }
        };

        if (sendToTelegram($fullname, $phone, $inn, $name_org, $email)) {
            $_SESSION['message'] = 'Отправлено';
        } else {
            $_SESSION['message'] = 'Ошибка отправки письма в телеграм';
        }
    } else {
        $_SESSION['message'] = 'Ошибка отправки письма';
    }
}
header("Location: /main#order");
