<?php

include_once 'includes/templates/header.php';
?>

<section class="catalog">
    <h1>Каталог</h1>

    <?php
    $query = "SELECT * FROM `products`";
    $result = queryDatabase($query);
    ?>

    <div class="tabs">
        <?php
        $query = "SELECT DISTINCT category FROM `products`";
        $categories = queryDatabase($query);
        foreach ($categories as $category) {
        ?>
            <a href="?category=<?= $category['category'] ?>"><?= $category['category'] ?></a>
        <?php
        }
        ?>
    </div>

    <div class="block-catalog">
        <?php
        if (empty($_GET['category'])) {
            $_GET['category'] = $result[0]['category'];
        }

        foreach ($result as $row) {

            if ($row['category'] === $_GET['category']) {
        ?>
                <div class="card-catalog">
                    <img src="<?= $row['image'] ?>" alt="image">
                    <p><?= $row['product_name'] ?></p>
                </div>
        <?php
            }
        }
        ?>
    </div>

</section>
<?php
include_once 'includes/templates/application.php';
?>
<?php
include_once 'includes/templates/footer.php';
?>