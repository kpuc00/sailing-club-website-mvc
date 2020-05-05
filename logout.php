<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sailing-website-mvc/app/includes/main.inc.php";
include "$path";

$UsersController = new UsersController();
$UsersController->logoutUser();
header('Location: index.php');
?>