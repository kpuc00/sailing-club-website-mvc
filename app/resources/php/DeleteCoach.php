<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $coach = new coach($_POST["id"], "", "", "", "", "");
    $CoachesController = new CoachesController();
    $CoachesController->delete($coach);

    header("Location: ../../../listOfCoaches.php");
?>