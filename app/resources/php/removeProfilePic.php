<?php
    include '../../includes/main.inc.php';

    $UsersController = new UsersController();
    $UsersController->removeProfilePic($_SESSION['id']);
    $_SESSION['success'] = "Your picture has been reset to the default one!";
    header('Location: ../../../profile.php');
?>