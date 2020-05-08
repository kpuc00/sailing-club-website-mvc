<?php
    include '../../includes/main.inc.php';

    $userID = $_GET["userId"];

    $UsersController = new UsersController();
    $UsersController->userSetUser($userID);
    header('Location: ../../../adminpage.php');
?>