<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Now we check if the data was submitted, isset() function will check if the data exists.
        if (!isset($_POST['username'], $_POST['password'], $_POST['passwordConfirm'], $_POST['email'], $_POST['displayname'])) {
            exit('Please complete the registration form!');
        }

        //Email Validation
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            exit('Email is not valid!');
        }

        //Invalid Characters Validation
        else if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
            exit('Username is not valid!');
        }

        //Display name character Length Check
        else if (strlen($_POST['displayname']) > 20 || strlen($_POST['displayname']) < 5) {
            exit('Display name must be between 5 and 20 characters long!');
        }

        //Password character Length Check
        else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            exit('Password must be between 5 and 20 characters long!');
        }

        //Checks if confirm password matches the password
        else if($_POST['passwordConfirm'] != $_POST['password']){
            exit('Passwords do not match!');
        }

        //register user
        else 
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $displayname = $_POST["displayname"];

            $user = new User(0, $username, $displayname, $email, null, null, $password);
            $UsersController = new UsersController();
            $UsersController->registerUser($user);

            header('Location: ../../../register.php');
        }

    }
?>