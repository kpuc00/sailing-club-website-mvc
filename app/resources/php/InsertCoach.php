<?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mvc-model/app/includes/main.inc.php";
        include "$path";
        
        $picture = $_FILES["file"]["name"];
        if ($picture == null) {
                $picture = "default.png";
        }

        $coach = new Coach($_POST["id"], $_POST["coachFirstName"], $_POST["coachLastName"], $_POST["coachDescription"], $picture, 0);

        $CoachesController = new CoachesController();
        $CoachesController->create($coach);

        $pictureDestination = $_SERVER['DOCUMENT_ROOT'];
        $pictureDestination .= "/mvc-model/app/storage/images/coach-img";

        move_uploaded_file($picture, $pictureDestination);

        header("Location: ../../../listOfCoaches.php");
?>