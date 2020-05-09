<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {            
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = new User($username, null, null, null, $password);
            $UsersController = new UsersController();
            $UsersController->authenticateUser($user);
            $_SESSION['error'] = $UsersController->checkForErrors($user);
               
            die(header('Location: ../../../login.php'));
        }

        else
        {
            $_SESSION['error'] = "Please fill in the blanks!";
            header('Location: ../../../login.php');
        }
    }
?>