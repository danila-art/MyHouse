<?php
include("connect_database.php");

$id = $_POST['id'];
$updateStatus = $_POST['update_status'];

$update = mysqli_query($link, "UPDATE `aplication` SET `status` = '$updateStatus' WHERE `id_aplication` = '$id'");
header("location: ../php/admin_panel.php");
