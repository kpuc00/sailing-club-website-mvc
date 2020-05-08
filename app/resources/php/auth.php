<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {            
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = new User(0, $username, null, null, null, null, $password);
            $UsersController = new UsersController();
            $UsersController->authenticateUser($user);
            $_SESSION['error'] = $UsersController->checkForErrors($user);
               
            header('Location: ../../../login.php');
        }
    }
?>