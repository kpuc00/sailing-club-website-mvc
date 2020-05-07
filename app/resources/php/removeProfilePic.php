<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    $UsersController = new UsersController();
    $UsersController->removeProfilePic($_SESSION['id']);
    $_SESSION['success'] = "Your picture has been reset to the default one!";
    header('Location: ../../../profile.php');
?>