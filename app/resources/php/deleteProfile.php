<?php 

    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["password"]))
        {
            $id = $_SESSION['id'];
            $username = $_SESSION['username'];
            $password = $_POST["password"];

            $user = new User($username, null, null, null, $password);
            $UsersController = new UsersController();
            $UsersController->authenticateUser($user);
            $_SESSION['error'] = $UsersController->checkForErrors($user);

            if (isset($_SESSION['error'])) 
            {
                die(header('Location: ../../../deleteProfile.php'));
            }

            else
            {
                $UsersController->deleteUser($id);
                $UsersController->logoutUser();
                die(header('Location: ../../../login.php?deletedProfile=true'));
            }               
        }

        else
        {
            $_SESSION['error'] = "Please fill in the blanks!";
            header('Location: ../../../deleteProfile.php');
        }
    }

?>