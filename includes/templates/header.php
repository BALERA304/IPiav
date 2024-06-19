<?php
require_once './includes/queryDatabase.php';
session_start();
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ipIAV</title>
    <link rel="stylesheet" type="text/css" href="../../view/css/style.css">
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="navbar__wrap">
                <div class="hamb">
                    <div class="hamb__field" id="hamb">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
                <div class="logo">
                    <a href="/"><img src="../view/img/logo.svg" alt=""></a>
                </div>
                <ul class="menu" id="menu">
                    <li> <a href="catalog">Каталог</a></li>
                    <li> <a href="goscontracts">Госконтракты</a></li>
                    <li> <a href="company">О компании</a></li>
                    <li> <a href="contact">Контакты</a></li>
                    <a href="#order" class="button">Заказать звонок</a>

                </ul>


            </div>
            <div class="header__contact-block">
                <h1><img src="view/img/watch.svg" alt="">Принимаем заявки 24/7</h1>
                <div class="contact">
                    <a href="">+7(926)-363-25-28</a>
                    <a href="">Cnab85@yandex.ru</a>
                </div>
        </nav>

        <div class="popup" id="popup">
            <ul class="menu" id="menu">
                <li> <a href="catalog">Каталог</a></li>
                <li> <a href="goscontracts">Госконтракты</a></li>
                <li> <a href="company">О компании</a></li>
                <li> <a href="contact">Контакты</a></li>


            </ul>
        </div>

        </div>

    </header>