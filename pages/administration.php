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
    $del = queryDatabase("DELETE FROM products WHERE `products`.`id` = '$id'");
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

<body class="body-admin">
    <header>
        <div class="logo">Панель управление контентом</div>
        <div class="block-buttons">
            <a href="viewOrders">Заявки</a>
            <a href="/?logout=true">Выход</a>
        </div>
    </header>
    <main>
        <nav>
            <ul>
                <!-- <li>Главная</li> -->
                <li>Каталог</li>
                <!-- <li>Госконтракты</li> -->
                <!-- <li>О компании</li> -->
                <!-- <li>Контактные данные</li> -->
            </ul>
        </nav>

        <?php
        $products = queryDatabase("SELECT * FROM products ORDER BY category ");
        ?>

        <section class="wrapper">
            <h1>Каталог</h1>
            <h2>Изменить Каталог</h2>
            <div class="container">
                <div class="cards-wrapper">
                    <?php
                    foreach ($products as $row) {
                    ?>
                        <div class="card">
                            <a href="?delete=<?= $row['id'] ?>" class="delete"><img src="view/img/cross-svgrepo-com.svg" alt="X"></a>
                            <img src="<?= $row['image'] ?>" alt="">
                            <p><?= $row['product_name'] ?></p>
                            <p><?= $row['category'] ?></p>
                        </div>
                    <?php } ?>


                </div>



                <form action="/includes/addCardCatalog.php" method="post" enctype="multipart/form-data">
                    <h2>Добавление новой категории</h2>
                    <label for="image">Загрузка только jpeg или png</label>
                    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" required>
                    <label for="text">Введите название</label>
                    <input type="text" id="text" name="product_name" placeholder="Название товара" required>

                    <label for="category">Можно написать новую категорию или выбрать существующую </label>
                    <input name="category" list="options" id="category" placeholder="Укажите категорию" />
                    <datalist id="options">
                        <?php
                        $result = queryDatabase("SELECT DISTINCT category FROM `products`");
                        foreach ($result as $row) {
                            echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                        }

                        ?>


                    </datalist>

                    <button type="submit">Загрузить </button>
                    <?php
                    if (isset($_SESSION['message']))  echo '<p class="message"> ' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                    ?>

                </form>

            </div>


        </section>
    </main>

</body>

</html>