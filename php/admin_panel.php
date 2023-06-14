<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/font_style.css">
    <style>
        body {
            margin: 0;
            border: 0;
            outline: none;
            padding: 0;
            overflow-x: hidden;
        }

        .admin {
            display: block;
            position: relative;
            background-image: url("../img/background-gray.png");
            background-size: cover;
            background-position: fixed;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
            background-color: #00000036;
            width: 100vw;
            height: auto;
        }

        .admin__heading {
            display: block;
            margin: 0;
            text-align: center;
            padding-top: 2%;
            padding-bottom: 2%;
        }

        .admin__heading h1 {
            margin: 0;
            color: white;
            font-size: 32px;
        }

        .exit {
            display: block;
            position: absolute;
            width: 5vw;
            height: auto;
            right: 2%;
            top: 2%;
            cursor: pointer;
        }

        .exit img {
            width: 100%;
            height: auto;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 90vw;
            height: auto;
            margin: 0 auto;
        }

        .aplication-block {
            display: block;
            background-color: white;
            border-radius: 10px;
            width: 40vw;
            height: auto;
            margin: 2%;
        }

        .aplication-block__flex {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            width: 90%;
            margin: 0 auto;
        }

        .aplication__box {
            display: block;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .aplication__email {
            display: block;
            padding-top: 1%;
            padding-bottom: 1%;
            width: 90%;
            height: auto;
            margin: 0 auto;
        }

        .aplication__message {
            display: block;
            padding-top: 1%;
            padding-bottom: 1%;
            width: 90%;
            height: auto;
            margin: 0 auto;
        }

        .aplication__status {
            display: block;
            padding-top: 1%;
            padding-bottom: 1%;
            width: 90%;
            height: auto;
            margin: 0 auto;
        }

        .form {
            display: block;
            width: 90%;
            height: auto;
            text-align: center;
        }

        .form__text {
            display: block;
            background-color: #e9e9e94c;
            padding: 2%;
            width: 70%;
            height: auto;
            border: 1px solid black;
            border-radius: 10px;
            margin: 3% auto;
        }

        .form__submit {
            display: block;
            background-color: rgba(255, 15, 0, .7);
            padding: 2%;
            width: 40%;
            height: auto;
            border: 0;
            border-radius: 10px;
            margin: 5% auto;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="admin">
        <div class="admin__heading">
            <h1>Заявки пользователей</h1>
        </div>
        <div class="exit" onclick="window.location.href ='../'">
            <img src=" ../img/icons/close-icon.png" alt="error">
        </div>
        <!-- Заявки php код -->
        <div class="flex">
            <?php
            include("connect_database.php");

            $outAplication = mysqli_query($link, "SELECT * FROM `aplication`");
            while ($aplication = mysqli_fetch_assoc($outAplication)) {
                echo "<div class=\"aplication-block\">
                <div class=\"aplication-block__flex\">
                    <div class=\"aplication__box\">
                        <h2 class=\"font__spectral-medium-500\">Имя: {$aplication['name_client']}</h2>
                    </div>
                    <div class=\"aplication__box\">
                        <h2 class=\"font__spectral-medium-500\">Номер: {$aplication['number_fhone']}</h2>
                    </div>
                </div>
                <div class=\"aplication__email\">
                    <h2 class=\"font__spectral-medium-500\">Email: {$aplication['email']}</h2>
                </div>
                <div class=\"aplication__message\">
                    <h2 class=\"font__spectral-medium-500\">Сообщение: {$aplication['message']}</h2>
                </div>
                <div class=\"aplication__status\">
                    <h2 class=\"font__spectral-medium-500\">Статус: {$aplication['status']}</h2>
                </div>
                <form action=\"update_aplication.php\" method=\"post\" class=\"form\">
                    <h2 class=\"font__spectral-medium-500\">Поменять статус заявки</h2>
                    <input type=\"hidden\" name=\"id\" value=\"{$aplication['id_aplication']}\">
                    <input class=\"form__text\" name=\"update_status\" type=\"text\" placeholder=\"Новый статус\">
                    <input class=\"form__submit\" type=\"submit\" value=\"Изменить\">
                </form>
                <form action=\"delete_aplication.php\" method=\"post\" class=\"form\">
                    <h2 class=\"font__spectral-medium-500\">Поменять статус заявки</h2>
                    <input type=\"hidden\" name=\"id\" value=\"{$aplication['id_aplication']}\">
                    <input style=\"width: 30%\" class=\"form__submit\" type=\"submit\" value=\"Удалить заявку\">
                </form>
            </div>";
            }
            ?>

        </div>
    </section>
</body>

</html>