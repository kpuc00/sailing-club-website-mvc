<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    $userID = $_GET["userId"];

    $UsersController = new UsersController();
    $UsersController->userSetUser($userID);
    header('Location: ../../../adminpage.php');
?>