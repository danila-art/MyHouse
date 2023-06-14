<?php
include("connect_database.php");
// Переменные для приёма:
//          name_client
//          number_fhone
//          email
//          message


// Проверка данных
if ($_POST['name_client'] != "") {
    $name = $_POST['name_client'];
}
if ($_POST['number_fhone'] != "") {
    $number = $_POST['number_fhone'];
}
if ($_POST['password'] != "") {
    $password = $_POST['password'];
}
if ($_POST['email'] != "") {
    $email = $_POST['email'];
} else {
    $email = null;
}
if ($_POST['message'] != "") {
    $message = $_POST['message'];
} else {
    $message = null;
}
$rang = "user";
// Добавление полльзователя если он есть
$searchUser = mysqli_query($link, "SELECT * FROM `user` WHERE `number_fhone` = '$number' AND `password` = '$password' ");
$rowUser = mysqli_fetch_assoc($searchUser);

if ($rowUser['id_user'] != '') {
    $idUser = $rowUser['id_user'];
    setcookie("User", $idUser, time() + 3600, '/');
} else {
    // Добавление в таблицу user
    $addUser = mysqli_query($link, "INSERT INTO `user` (`name_client`,`number_fhone`,`password`,`email`,`rang`) VALUES ('$name','$number','$password','$email','$rang')");
    $searchUser = mysqli_query($link, "SELECT * FROM `user` WHERE `number_fhone` = '$number' AND `password` = '$password' ");
    $rowUser = mysqli_fetch_assoc($searchUser);
    $idUser = $rowUser['id_user'];
    setcookie("User", $idUser, time() + 3600, '/');
}
// Изначальный статус заявки
$status = "В ожидании";
// Добавление в таблицу Заявки
$addAplication = mysqli_query($link, "INSERT INTO `aplication` (`name_client`,`number_fhone`,`email`,`message`,`status`) VALUES ('$name','$number','$email','$message','$status')");

echo "
<style>
body{
        margin: 0;
    padding: 0;
    outline: none;
    border: none;
    overflow-x: hidden;
}
.button{
    display: block;
    width: 8vw;
    border: 1px solid white;
    text-decoration: none;
    color: white;
    padding: 2%;
    transition: .3s;
    margin: 0 auto;
}
.button:hover{
    transform: scale(1.1)
}
</style>
<body>
<div style=\"display: flex; width: 100vw; height: 100vh; background-image: url('../img/header_background.png'); background-size: 100% 100%; background-repeat: no-repeat; align-items: center;\">
    <div style=\"display: block; background-color: rgb(0 0 0 / 55%);; text-align: center; width: 40vw; height: 30vh; margin: 0 auto\">
        <h1 style =\"padding-top: 2%; color: white; padding-bottom: 2%;\">Ваша заявка успешно создана</h1>
        <a class=\"button\" href=\"../\">Вернуться на главную</a>
    </div>
    </div>
    
</body>";
