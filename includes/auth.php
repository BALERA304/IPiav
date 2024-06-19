<?php
require 'queryDatabase.php';
session_start();

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$query = "SELECT * FROM `admin`";
$result = queryDatabase($query);



if ($login === $result[0]['login']) {
    if (password_verify($password, $result[0]['password'])) {
        $_SESSION['loggedin'] = true;
        header("Location: /adminPanel");
    } else {
        unset($_SESSION['loggedin']);
        $_SESSION['message'] = 'Неправильный Пароль';
        header("Location: /admin");
        die();
    }
} else {
    unset($_SESSION['loggedin']);
    $_SESSION['message'] = 'Неправильный логин';
    header("Location: /admin");
    die();
}
