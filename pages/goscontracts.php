<?php
include_once 'includes/templates/header.php';
?>
<section class="goscontracts">

    <?php
    $query = "SELECT * FROM `pageGos`";
    $result = queryDatabase($query);
    ?>


    <h1>Госконтракты</h1>
    <div class="accordion-goscontracts">
        <div class="row">
            <div class="col">
                <div class="tabs">
                    <div class="tab">
                        <input type="checkbox" id="chck1">
                        <label class="tab-label" for="chck1">
                            <p>Меню</p>
                        </label>
                        <div class="tab-content">
                            <?php
                            foreach ($result as $row) {
                            ?>
                                <a href="?type=<?= $row['name'] ?>"><?= $row['name'] ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="block-goscontracts">
        <div class="menu-goscontracts">
            <?php
            foreach ($result as $row) {
            ?>
                <a href="?type=<?= $row['name'] ?>"><?= $row['name'] ?></a>
            <?php
            }
            ?>

        </div>
        <div class="text-goscontracts">
            <?php
            if (empty($_GET['type'])) {
                $_GET['type'] = $result[0]['name'];
            }
            foreach ($result as $row) {
                if ($row['name'] === $_GET['type']) {
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<p>' . $row['text'] . '</p>';
                    break;
                }
            }


            ?>
        </div>
    </div>

</section>

<?php
include_once 'includes/templates/application.php';
?>

<?php
include_once 'includes/templates/footer.php';
?>