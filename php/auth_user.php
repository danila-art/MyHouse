<?php
include("connect_database.php");

if ($_POST['number'] != "") {
    $number = $_POST['number'];
}
if ($_POST['password'] != "") {
    $password = $_POST['password'];
}

$searchUser = mysqli_query($link, "SELECT * FROM `user` WHERE `number_fhone` = '$number' AND `password` = '$password' ");
$rowUser = mysqli_fetch_assoc($searchUser);
if ($rowUser['rang'] == 'admin') {
    header('Location: ../php/admin_panel.php');
} else if ($rowUser['id_user'] != '') {
    $idUser = $rowUser['id_user'];
    setcookie("User", $idUser, time() + 3600, '/');
    header('Location: ../');
}
