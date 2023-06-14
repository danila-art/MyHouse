<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyHouse</title>
    <link rel="stylesheet" href="css/main_stylesheet.css">
    <link rel="shortcut icon" href="img/Favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/font_style.css">
    <link rel="stylesheet" href="css/module_style.css">
</head>

<body>
    <section class="module" id="module">
        <?php
        include("php/connect_database.php");
        if ($_COOKIE['User'] == '') {
            echo "<div class=\"module__container\">
            <div class=\"module__container-auth\">
                <div class=\"auth__close\" id=\"close_button\">
                    <img src=\"img/icons/close-icon.png\" alt=\"error\">
                </div>
                <div class=\"auth__heading\">
                    <h2>Авторизация</h2>
                </div>
                <form action=\"php/auth_user.php\" method=\"post\" onsubmit=\"return validAuth(event)\">
                    <div class=\"auth__box\">
                        <input type=\"text\" name=\"number\" placeholder=\"Введите номер телефона\" id=\"auth_number\">
                        <p style=\"display: none; color: red;\">Вы не ввели номер телефона</p>
                    </div>
                    <div class=\"auth__box\">
                        <input type=\"password\" name=\"password\" placeholder=\"Введите пароль\" id=\"auth_pass\">
                        <p style=\"display: none; color: red;\">Вы не ввели пароль</p>
                    </div>
                    <div class=\"auth__submit\">
                        <input type=\"submit\" value=\"Войти\">
                    </div>
                </form>
            </div>
        </div>";
        } else {
            if ($_COOKIE['User'] != '') {
                $idUser = $_COOKIE['User'];
                $searchUser = mysqli_query($link, "SELECT * FROM `user` WHERE `id_user` = '$idUser' ");
                $rowUser = mysqli_fetch_assoc($searchUser);
                // echo $rowUser['name_client'];
                // echo $rowUser['number_fhone'];
                $number = $rowUser['number_fhone'];
                $name = $rowUser['name_client'];
                $searchAplication = mysqli_query($link, "SELECT * FROM `aplication` WHERE `number_fhone` = '$number'");

                echo " <div class=\"my-aplictation\">
            <div class=\"auth__close\" id=\"closeButtonMyAplictation\">
                <img src=\"img/icons/close-icon.png\" alt=\"error\">
            </div>
            <div class=\"my-aplication__heading\">
                <h2>Мои заявки</h2>
            </div>";
                // Код выгрузки заявок
                while ($arrayAplication = mysqli_fetch_assoc($searchAplication)) {
                    // echo $arrayAplication['name_client'];
                    // echo $arrayAplication['number_fhone'];
                    // echo $arrayAplication['message'];
                    // echo $arrayAplication['status'];
                    echo "        <div class=\"out-aplication\">
            <div class=\"out-aplication__name\">
                <h1 class=\"font__spectral-bold-700\">{$arrayAplication['name_client']}</h1>
            </div>
            <div class=\"out-aplication__flex\">
                <div class=\"out-aplication__box\">
                    <h1 class=\"font__spectral-regular-400\">Номер телефона</h1>
                    <h2 class=\"font__spectral-medium-500 \">{$arrayAplication['number_fhone']}</h2>
                </div>
                <div class=\"out-aplication__box\">
                    <h1 class=\"font__spectral-regular-400\">Сообщение</h1>
                    <h2 class=\"font__spectral-medium-500 \">{$arrayAplication['message']}</h2>
                </div>
                <div class=\"out-aplication__box\">
                    <h1 class=\"font__spectral-regular-400\">Статус Заявки</h1>
                    <h2 class=\"font__spectral-medium-500 \">{$arrayAplication['status']}</h2>
                </div>
            </div>
        </div>
";
                }
                echo "</div>";
            }
        }
        ?>



    </section>
    <!-- Первая секия -->
    <section class="section-1">
        <!-- header -->
        <header class="header">
            <div class="header__flex">
                <div class="header__logo">
                    <img src="img/Logo.png" alt="error_upload_logo">
                </div>
                <nav class="navigation">
                    <div class="navigation__box">
                        <h3><a href="#about" class="font__spectral-regular-400">О нас</a></h3>
                    </div>
                    <div class="navigation__box">
                        <h3><a href="#projects" class="font__spectral-regular-400">Наши проекты</a></h3>
                    </div>
                    <div class="navigation__box">
                        <h3><a href="#" id="buttonAplication" class="font__spectral-regular-400">Заявки</a></h3>
                    </div>
                </nav>
                <div class="header__button">
                    <h3><a href="#goAplication" class="font__spectral-medium-500">Оставить заявку</a></h3>
                </div>
            </div>
        </header>
        <!-- Текстовый контент 1 секции  -->
        <div class="section-1__text">
            <div class="section-1__heading">
                <h1 class="font__spectral-bold-700">ПРОЕКТЫ ДОМОВ</h1>
            </div>
            <div class="section-1__h3">
                <h3 class="font__spectral-medium-500">Дома в нашем коттеджном посёлке – это сочетание красоты,
                    надежности и комфорта. Экологически чистые
                    материалы и
                    современные технологии позволяют достичь нового уровня комфорта загородной жизни.</h3>
            </div>
            <div class="section-1__flex-container">
                <div class="section-1__flex-box">
                    <h2 class="font__baijamjuree-bold-700">5</h2>
                    <h3 class="font__spectral-medium-500">лет с вами</h3>
                </div>
                <div class="section-1__flex-box" style="width: 14vw;">
                    <h2 class="font__baijamjuree-bold-700">Гарантия качества</h2>
                </div>
                <div class="section-1__flex-box">
                    <h3 class="font__spectral-medium-500">Более</h3>
                    <h2 class="font__baijamjuree-bold-700">1000</h2>
                    <h3 class="font__spectral-medium-500">Заказов</h3>
                </div>
            </div>
            <div class="section-1__button">
                <a href="#projects" class="font__spectral-bold-700">Наши проекты</a>
            </div>
        </div>
    </section>
    <!-- Доработать секцию 2 -->
    <section class="section-2">
        <div class="section-2__heading">
            <h1 class="font__baijamjuree-bold-700">Почему нам доверяют?</h1>
            <hr>
        </div>
        <div class="section-2__flex">
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-1-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">24/7 СЕРВИС</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Работаем 24 часа семь дней в неделю! Принимаем заказы в любое
                        время суток.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-2-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">РАБОТАЕМ ОПЕРАТИВНО!</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Работаем оперативно! Перезвоним через 10 минут и назначим
                        встречу уже на сегодня.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-3-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">ЮРИДИЧЕСКАЯ БЕЗОПАСНОСТЬ</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Предоставление договоора и всей технической документации
                        необходимой для строительства.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-4-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">ГАРАНТИЯ КАЧЕСТВА</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Многоступенчатый контроль качества, гарантия на строительные
                        работы.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-5-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">БОЛЬШОЙ ОПЫТ РАБОТЫ</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Опыт строительства домов разной сложностию</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-6-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">ГИБКАЯ СИСТЕМА ОПЛАТЫ</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Строительство в рассрочку, кредит, материнский капитал,
                        бартер.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-7-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">БЕСПЛАТНЫЙ ВЫЕЗД СПЕЦИАЛИСТА</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Выезд специалиста для консультации.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-8-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">ТОЧНАЯ СТОИМОСТЬ</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Фиксированная цена на момент подписания договора.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-9-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">ПОМОЩЬ ПРИ ПОКУПКЕ УЧАСТКА</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Консультация по возможности строительства. Помощь при
                        оформлении.</p>
                </div>
                <hr>
            </div>
            <div class="confidence">
                <div class="confidence__img">
                    <img src="img/icons/section-2_icons/icons-10-64px.png" alt="error-upload-icons">
                </div>
                <div class="confidence__heading">
                    <!-- h2 <-- font__spectral-bold-700 -->
                    <h2 class="font__spectral-bold-700">РАЗРЕШЕНИЯ НА СТРОИТЕЛЬСТВО</h2>
                </div>
                <div class="confidence__text">
                    <!-- p <-- font__spectral-regular-400 -->
                    <p class="font__spectral-regular-400">Обращение в компетентные органы от лица заказчика. Подготовка
                        документов.</p>
                </div>
                <hr>
            </div>
        </div>
    </section>
    <!-- Секция 3 -->
    <section class="section-3" id="goAplication">
        <div class="section-3__heading">
            <h1 class="font__baijamjuree-bold-700">У вас есть вопросы?</h1>
        </div>
        <div class="section-3__container">
            <div class="section-3__container-heading">
                <h2 class="font__spectral-medium-500">Оставьте заявку и мы свяжемся с вами в течении 5 минут и ответим
                    на все ваши вопросы</h2>
            </div>
            <form action="php/add_aplication.php" method="post" onsubmit="return validForm(event)">
                <div class="form__box">
                    <input class="font__spectral-regular-400" id="nameClient" name="name_client" type="text" placeholder="Ваше имя">
                    <p style="color: red; display: none; text-align: center; padding: 0; margin-top: 0;">Вы не ввели Имя
                    </p>
                </div>
                <div class="form__box">
                    <input class="font__spectral-regular-400" id="numberFhone" name="number_fhone" type="text" placeholder="Ваш телефон">
                    <p style="color: red; display: none; text-align: center; padding: 0; margin-top: 0;">Вы не ввели
                        Номер
                        телефона</p>
                </div>
                <div class="form__box">
                    <input class="font__spectral-regular-400" id="password" name="password" type="password" placeholder="Придумайте пароль">
                    <p style="color: red; display: none; text-align: center; padding: 0; margin-top: 0;">Вы не ввели
                        Пароль</p>
                </div>
                <div class="form__box">
                    <input class="font__spectral-regular-400" id="email" name="email" type="text" placeholder="email (необязательно)">
                </div>
                <div class="form__box">
                    <input class="font__spectral-regular-400" id="message" name="message" type="text" placeholder="Ваше сообщение (необязательно)">
                </div>
                <div class="form__submit">
                    <input class="font__spectral-regular-400" id="formSubmit" type="submit" value="Оставить заявку">
                </div>
            </form>
        </div>
    </section>
    <!-- Секция 4 -->
    <section class="section-4" id="projects">
        <div class="section-4__heading">
            <h1 class="font__baijamjuree-bold-700">Наши проекты</h1>
        </div>
        <div class="home">
            <div class="home__img">
                <img src="img/home/home_1/1_.svg" alt="error">
            </div>
            <!-- сделать слайдер -->
            <div class="home__text">
                <div class="home__heading">
                    <h2 class="font__spectral-bold-700">"Моя семья"</h2>
                </div>
                <div class="home__h3">
                    <h3 class="font__spectral-medium-500">Одноэтажный дом</h3>
                </div>
                <div class="home__h3">
                    <h3 class="font__spectral-medium-500">Общая площадь 84 м²<br>
                        Участок 7 сот.</h3>
                </div>
                <div class="home__text-inner">
                    <p class="font__spectral-regular-400">Все коммуникации заведены в дом. Внутри уже выполнена опция
                        «ремонт под ключ» с применение
                        высококачественных,
                        современных материалов. Перед домом оборудовано парковочное место.</p>
                </div>
            </div>
        </div>
        <div class="home__background">
            <div class="home">
                <div class="home__text">
                    <div class="home__heading">
                        <h2 style="color: white;" class="font__spectral-bold-700">«Родом из детства»</h2>
                    </div>
                    <div class="home__h3">
                        <h3 style="color: white;" class="font__spectral-medium-500">Одноэтажный дом</h3>
                    </div>
                    <div class="home__h3">
                        <h3 style="color: white;" class="font__spectral-medium-500">Общая площадь 136 м²<br>
                            Жилая площадь 100 м</h3>
                    </div>
                    <div class="home__text-inner">
                        <p style="color: white;" class="font__spectral-regular-400">Современный одноэтажный дом на
                            участке в 7 соток.
                            Идеальный
                            вариант с 2 спальнями для молодой
                            семьи. Готовый ремонт,
                            функциональная планировка. В дом заведены все коммуникации.</p>
                    </div>
                </div>
                <div class="home__img">
                    <img src="img/home/home_2/1.jpeg" alt="error">
                </div>
                <!-- сделать слайдер -->
            </div>
        </div>
        <div class="home">
            <div class="home__img">
                <img src="img/home/home_3/1.jpeg" alt="error">
            </div>
            <!-- сделать слайдер -->
            <div class="home__text">
                <div class="home__heading">
                    <h2 class="font__spectral-bold-700">«Мои университеты»</h2>
                </div>
                <div class="home__h3">
                    <h3 class="font__spectral-medium-500">Двухэтажный дом</h3>
                </div>
                <div class="home__h3">
                    <h3 class="font__spectral-medium-500">Общая площадь 174 м²<br>
                        Жилая площадь 150 м.</h3>
                </div>
                <div class="home__text-inner">
                    <p class="font__spectral-regular-400">Двухэтажный дом, созданный для тех, кто хочет позволить себе
                        немного больше! Просторная
                        кухня-столовая с выходом на
                        собственную веранду, выделенная гостиная зона, функциональное хоз. помещение. На втором этаже
                        вольготно разместились 3
                        спальни, одна из которых имеет собственную гардеробную и приватный выход на балкон.</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer" id="about">
        <div class="footer__logo">
            <img src="img/Logo-white.png" alt="error">
        </div>
        <div class="footer__flex">
            <div class="footer__box">
                <div class="footer__img">
                    <img src="img/icons/footer_icons/Location.png" alt="error-upload-icons-footer">
                </div>
                <div class="footer__box-heading">
                    <h2 class="font__spectral-medium-500">Наш адрес</h2>
                </div>
                <div class="footer__text">
                    <p>г. Астрахань<br>
                        ул. Минусинская 6 офис 216</p>
                </div>
            </div>
            <div class="footer__box">
                <div class="footer__img">
                    <img src="img/icons/footer_icons/time_list.png" alt="error-upload-icons-footer">
                </div>
                <div class="footer__box-heading">
                    <h2 class="font__spectral-medium-500">Наш график</h2>
                </div>
                <div class="footer__text">
                    <p class="font__spectral-regular-400">Пн-Пт с 9:00 до 17:00<br>
                        Сб-Вс Выходной</p>
                </div>
            </div>
            <div class="footer__box">
                <div class="footer__img">
                    <img src="img/icons/footer_icons/phone.png" alt="error-upload-icons-footer">
                </div>
                <div class="footer__box-heading">
                    <h2 class="font__spectral-medium-500">Наш телефон</h2>
                </div>
                <div class="footer__text">
                    <p class="font__spectral-regular-400">8 (927) 587-04-44</p>
                </div>
            </div>
        </div>
        <div class="footer__button">
            <h3><a href="#goAplication" class="font__spectral-medium-500">Оставить заявку</a></h3>
        </div>
    </footer>
    <script src="js/script_form.js"></script>
    <script src="js/script_module.js"></script>
</body>

</html>