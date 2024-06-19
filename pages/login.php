<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="view/css/style.css">
</head>

<body class="body-login">

    <form action="/includes/auth.php" method="post" class="login">
        <h1>Авторизация</h1>
        <input name='login' type="text" placeholder="Введите логин">
        <input name='password' type="password" placeholder="Введите пароль">
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="message"> ' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
        <button type="submit" class="button">Войти</button>
        <?php

        ?>
    </form>

</body>

</html>