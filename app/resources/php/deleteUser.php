<?php
    include '../../includes/main.inc.php';

    $userID = $_GET["userId"];

    $UsersController = new UsersController();
    $UsersController->userDeleteUser($userID);
    header('Location: ../../../adminpage.php');
?>