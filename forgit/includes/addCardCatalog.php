<?php
session_start();
require 'queryDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['image'])) {

        $image = $_FILES['image'];
        $product_name = htmlspecialchars(trim($_POST['product_name']));

        if ($image['size'] <= 6000000) {

            $allowedTypes = ['image/jpeg', 'image/png'];
            if (in_array($image['type'], $allowedTypes)) {

                $filename = uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

                $uploadPath = '../view/img/catalog/' . $filename;
                define('MYSQLI_DEBUG_TRACE_ENABLED', 0);

                if (move_uploaded_file($image['tmp_name'], $uploadPath)) {

                    $category = $_POST['category'];

                    $query = "INSERT INTO products (`image`, category, product_name ) VALUES ('$uploadPath', '$category','$product_name')";
                    $result = queryDatabase($query);

                    if (!$result) {
                        $_SESSION['message'] = 'Ошибка при выполнении запроса: ' . $connect->error;
                        header("Location: ../adminPanel");
                        exit;
                    } else {
                        $_SESSION['message'] = 'Файл успешно загружен';
                        header("Location: ../adminPanel");
                        exit;
                    }
                } else {
                    $_SESSION['message'] = 'Ошибка при загрузке файла';
                    header("Location: ../adminPanel");
                    exit;
                }
            } else {
                $_SESSION['message'] = 'Недопустимый тип файла';
                header("Location: ../adminPanel");
                exit;
            }
        } else {
            $_SESSION['message'] = 'Размер файла превышает допустимый лимит';
            header("Location: ../adminPanel");
            exit;
        }
    } else {
        $_SESSION['message'] = 'Файл не был загружен';
        header("Location: ../adminPanel");
        exit;
    }
}
