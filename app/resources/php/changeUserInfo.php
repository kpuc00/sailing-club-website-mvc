<?php 

    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $errorMsg = "";

        // Now we check if the data was submitted.
        if (!isset($_POST['displayname'], $_POST['email'], $_POST['phone'])) {
            $errorMsg .= "Please complete the form!";
        }

        //Display name character Length Check
        else if (strlen($_POST['displayname']) > 20 || strlen($_POST['displayname']) < 4) {
            $errorMsg .= "The display name must be between 4 and 20 characters long!";
        }

        //Email Validation
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "The email is not valid!";
        }

        //Phone number validation
        else if(preg_match("/^[0-9]{10}+$/", $_POST['phone']) == 0)
        {
            $errorMsg .= "Invalid phone number!";
        }

        //change password
        else {
            $userId = $_SESSION['id'];
            $displayname = $_POST['displayname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            $UsersController = new UsersController();
            $UsersController->changeUserData($userId, $displayname, $email, $phone);

            $_SESSION['usersuccess'] = "Your personal information has been changed!";                
            die(header('Location: ../../../profile.php'));
        }

        $_SESSION['error'] = $errorMsg;
        header('Location: ../../../changeuserinfo.php');

    }

?>