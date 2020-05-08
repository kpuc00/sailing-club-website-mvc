<?php
    include 'app/includes/main.inc.php';

    $UsersController = new UsersController();
    $UsersController->logoutUser();
    header('Location: index.php');
?>