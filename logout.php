<?php
require_once 'core\init.php';

session_unset($_SESSION["user"]);
session_destroy();
header('Location: login.php');
?>
