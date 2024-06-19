<section class="order" id="order">
    <div class="order-guarantee">
        <div class="guarantee">
            <h2>С нами ваше процветание гарантированно, оставьте заявку и мы перезвоним вам в течении 15 минут.
            </h2>
            <img src="view/img/order/guarantee.svg" alt="">
        </div>

    </div>
    <div class="block-order">
        <div class="order-card">

            <div class="application">
                <h1>Наши контакты</h1>
                <form action="/includes/sendOrder.php" method="post" class="order-form">
                    <h2>Остались вопросы? <br> <span>Спросите специалиста!</span></h2>
                    <div class="block-input">
                        <input name="name" type="text" placeholder="Ваше имя">
                        <input name="phone" type="text" placeholder="Ваш телефон">
                        <input name="inn" type="text" placeholder="ИНН">
                        <input name="name_org" type="text" placeholder="Название организации">
                        <input name="email" type="text" placeholder="Email">
                        <input name="submit" type="submit" class="button" value="Отправить">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo '<p class="message"> ' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                        ?>

                    </div>
                </form>
            </div>
            <div class="info">
                <div class="contact">
                    <img src="view/img/order/phone.svg" alt="">
                    <p>+7(926)-363-25-28</p>
                </div>
                <div class="contact">
                    <img src="view/img/order/time.svg" alt="">
                    <p>C 8:00 до 19:00 <br>
                        без выходных</p>
                </div>
                <div class="contact">
                    <img src="view/img/order/mail .svg" alt="">
                    <p>Cnab85@yandex.ru</p>
                </div>
            </div>

        </div>
        <img class="img" src="view/img/logo.svg" alt="">
    </div>
</section>