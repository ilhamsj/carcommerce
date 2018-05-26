<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "penjualan_mobil";

$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error() . 'Ada masalah pada database');
?>
