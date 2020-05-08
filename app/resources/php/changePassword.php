<?php 

    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $errorMsg = "";

        // Now we check if the data was submitted.
        if (!isset($_POST['oldPassword'], $_POST['newPassword'], $_POST['passwordConfirm'])) {
            $errorMsg .= "Please complete the form!";
        }

        else if (strlen($_POST['newPassword']) > 20 || strlen($_POST['newPassword']) < 5) {
            $errorMsg .= "The new password must be between 5 and 20 characters long!";
        }

        //Checks if confirm password matches the password
        else if ($_POST['passwordConfirm'] != $_POST['newPassword']){
            $errorMsg .= "Password and Confirm password does not match!";
        }

        //change password
        else {
            $userId = $_SESSION['id'];
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            
            $UsersController = new UsersController();
            $UsersController->checkUserPassword($userId, $oldPassword);
            
            if ($_SESSION['checkpassword'] == "match") {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $UsersController->changeUserPassword($userId, $hashedPassword);
                $_SESSION['passwordsuccess'] = "Your password has been changed!";                
                die(header('Location: ../../../profile.php'));
            }

            if ($_SESSION['checkpassword'] == "wrong")
            {
                $errorMsg .= "The old password is wrong!";
            }
        }

        $_SESSION['error'] = $errorMsg;
        header('Location: ../../../changepassword.php');

    }

?>