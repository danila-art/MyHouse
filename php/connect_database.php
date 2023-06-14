<?php
$link = mysqli_connect('localhost', 'root', 'root', 'myhouse_database');
if(!$link){
    die('Could not connect: ' . mysqli_error());
}
// echo "Connected complete";
// mysqli_close($link);