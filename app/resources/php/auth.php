<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {            
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = new User(0, $username, null, null, null, null, $password);
            $UsersController = new UsersController();
            $UsersController->authenticateUser($user);
            $UsersController->saveUserToSession($user);     
            header('Location: ../../../login.php');
        }
    }
?>