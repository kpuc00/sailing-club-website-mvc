<?php
    include '../../includes/main.inc.php';
    
    $picture = $_FILES["file"]["name"];

    $coach = new Coach($_POST["id"], $_POST["coachFirstName"], $_POST["coachLastName"], $_POST["coachDescription"], $picture, 0);

    $CoachesController = new CoachesController();
    $CoachesController->update($coach);

    $pictureDestination = $_SERVER['DOCUMENT_ROOT'];
    $pictureDestination .= "/public_html/app/storage/images/coach-img";

    move_uploaded_file($picture, $pictureDestination);

    header("Location: ../../../listOfCoaches.php");
?>