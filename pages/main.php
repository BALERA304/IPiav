<?php
include_once 'includes/templates/header.php';

if (isset($_GET['logout'])) {
    unset($_SESSION['loggedin']);
    unset($_GET['logout']);
}


?>

<section class="preview">
    <div class="preview-photo">
        <h1>Тендерные поставки: быстро, качественно, надежно!</h1>
    </div>

</section>
<!-- перемычка повторяющийся -->
<div class="jumper">
    <div class="container">
        <h2>Работаем по 44-ФЗ</h2>
        <a href="#order">Заказать звонок</a>
    </div>

</div>
<section class="advantage">
    <h1>Наши преищумества</h1>
    <div class="advantage-blocks">
        <div class="advantage-block">
            <img src="../view/img/advantage/icon-site-1.svg" alt="">
            <p>Имея большой опыт в торговой сфере, понимаем, что прямые продажи постепенно уступают место тендерным
                поставкам. В связи с этим, мы переключили свое внимание на тендерные поставки и стали дилерами
                многих заводов, а также мы занимаемся прямыми поставками импортного оборудования. Это позволяет нам
                предлагать широкий ассортимент строительных материалов и различного оборудования для участия в
                электронных торгах по ФЗ-44, ФЗ-223 и ФЗ-275.</p>
        </div>
        <div class="advantage-cards">
            <div class="card">
                <img src="../view/img/advantage/icon-site-two.svg" alt="">
                <p>Основное направление это поставки для государственных оборон заказов (ГОЗ). Работаем с
                    казначейскими счетами, открываем отдельные счета ПАО «ПСБ».</p>
            </div>
            <div class="card">
                <img src="../view/img/advantage/icon-site-3.svg" alt="">
                <p>Мы также активно развиваем направление по изготовлению металлоконструкций, чтобы предложить нашим
                    клиентам еще больше возможностей и решений для их проектов.</p>
            </div>
        </div>
        <div class="advantage-block">
            <img src="../view/img/advantage/icon-site-4.svg" alt="">
            <p>Мы гордимся нашими партнерствами с ведущими производителями и предлагаем широкий ассортимент
                строительных материалов для участия в тендерных поставках. Наша команда готова помочь вам с выбором
                и поставкой необходимых материалов, чтобы ваш проект был успешно реализован.</p>
        </div>
    </div>
</section>
<!-- перемычка повторяющийся -->
<div class="jumper">
    <div class="container">
        <h2>Лучшие на рынке</h2>
        <a href="#order">Заказать звонок</a>
    </div>

</div>
<section class="offer">
    <h1>Что мы предлагаем</h1>
    <div class="offer-cards">
        <?php
        $query = "SELECT `product_name`, `image` FROM `products` LIMIT 3";
        $result = queryDatabase($query);
        foreach ($result as $row) {
        ?>
            <div class="card">
                <img src="<?= $row['image'] ?>" alt="фото категории товара">

                <h3><?= $row['product_name'] ?></h3>

            </div>
        <?php

        }
        ?>


    </div>
    <a href="catalog" class="button">Перейти в каталог</a>
</section>

<div class="jumper">
    <div class="container">
        <h2>Большой выбор материалов</h2>
        <a href="#order">Заказать звонок</a>
    </div>

</div>

<div class="contracts-card">
    <div class="info">
        <h1>О Госконтрактах</h1>
        <p>Сделаем комерчиские предложения, примем участие на вашей или на площадке АСТ ГОЗ , откроем отдельный счет,
            привезем в срок со всеми комплектами документов</p>
        <a href="goscontracts">Подробнее о госконтрактах</a>
    </div>

</div>


<?php
include_once 'includes/templates/application.php';
?>

<?php
include_once 'includes/templates/footer.php';
?>