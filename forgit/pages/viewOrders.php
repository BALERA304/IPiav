<?php
session_start();
if (empty($_SESSION['loggedin']) and $_SESSION['loggedin'] !== true) {
    header('Location: /');
    die();
}
require 'includes/queryDatabase.php';
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = queryDatabase("DELETE FROM orders WHERE `id` = '$id'");
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="view/css/style.css">
</head>

<body class="body-admin body-orders">
    <header>
        <div class="logo">Заявки</div>
        <div class="block-buttons">
            <a href="adminPanel">Назад</a>
            <a href="/?logout=true">Выход</a>
        </div>
    </header>

    <?php
    $orders = queryDatabase("SELECT * FROM orders ORDER BY id DESC ");
    ?>

    <div class="orders-wrapper">
        <?php
        foreach ($orders as $row) {
        ?>
        <div class="card">
            <a href="?delete=<?= $row['id'] ?>" class="delete"><img src="view/img/cross-svgrepo-com.svg" alt="X"></a>

            <p><span style='font-weight: 600;'>ФИО:</span> <?= $row['fullname'] ?></p>
            <p><span style='font-weight: 600;'>Телефон:</span> <?= $row['phone'] ?></p>
            <p><span style='font-weight: 600;'>ИНН:</span> <?= $row['inn'] ?></p>
            <p><span style='font-weight: 600;'>Название организации:</span> <?= $row['name_org'] ?></p>
            <p><span style='font-weight: 600;'>Почта:</span> <?= $row['email'] ?></p>
        </div>
        <?php } ?>


    </div>

</body>

</html>