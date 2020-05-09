<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $errorMsg = "";
        // Now we check if the data was submitted, isset() function will check if the data exists.
        if (!isset($_POST['username'], $_POST['password'], $_POST['passwordConfirm'], $_POST['email'], $_POST['phone'], $_POST['displayname'])) {
            $errorMsg .= "Please complete the registration form!";
        }

        //Email Validation
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "The email is not valid!";
        }

        //Invalid Characters Validation
        else if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
            $errorMsg .= "The username is not valid!";
        }

        //Display name character Length Check
        else if (strlen($_POST['displayname']) > 20 || strlen($_POST['displayname']) < 4) {
            $errorMsg .= "The display name must be between 4 and 20 characters long!";
        }

        //Phone number validation
        else if(preg_match("/^[0-9]{10}+$/", $_POST['phone']) == 0)
        {
            $errorMsg .= "Invalid phone number!";
        }

        //Password character Length Check
        else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $errorMsg .= "The password must be between 5 and 20 characters long!";
        }

        //Checks if confirm password matches the password
        else if($_POST['passwordConfirm'] != $_POST['password']){
            $errorMsg .= "Password and Confirm password does not match!";
        }

        //register user
        else 
        {
            $username = $_POST["username"];
            $displayname = $_POST["displayname"];
            $email = $_POST["email"];
            $phone = $_POST['phone'];
            $password = $_POST["password"];

            $user = new User($username, $displayname, $email, $phone, $password);
            $UsersController = new UsersController();
            $UsersController->registerUser($user);
            die(header('Location: ../../../register.php'));
        }

        $_SESSION['error'] = $errorMsg;
        header('Location: ../../../register.php');

    }
?>