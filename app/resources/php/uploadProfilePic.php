<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    $uploaddir = '../../storage/images/profilepictures/';
    $uploadedFileName = $_SESSION['username'] . ".jpg";
    $uploadfile = $uploaddir . $uploadedFileName;

    if(isset($_FILES['profilepic'])) {
        $errors = "";
        $maxsize    = 2097152; //2MB
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/gif',
            'image/png'
        );

        if((!in_array($_FILES['profilepic']['type'], $acceptable)) && (!empty($_FILES["profilepic"]["type"]))) {
            $errors .= 'Invalid file type. Only JPG, GIF and PNG types are accepted. ';
        }
        
        else if(($_FILES["profilepic"]["size"] == 0)) {
            $errors .= 'No file selected. ';
        }

        else if(($_FILES['profilepic']['size'] >= $maxsize)) {
            $errors .= 'File too large. File must be less than 2 megabytes. ';
        }

        else 
        {
            move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadfile);
            $UsersController = new UsersController();
            $UsersController->updateProfilePic($_SESSION['id'], $uploadedFileName);
            $_SESSION['error'] = null;
            $_SESSION['success'] = "Your picture has been uploaded! I may take some time to update in your browser!";
            header('Location: ../../../profile.php');
        } 
        
        $_SESSION['success'] = null;
        $_SESSION['error'] = $errors;

        header('Location: ../../../profile.php');
        die(); //Ensure no more processing is done
    }
?>