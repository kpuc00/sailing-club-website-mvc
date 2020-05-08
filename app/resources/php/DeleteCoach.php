<?php
    include '../../includes/main.inc.php';

    $coach = new coach($_POST["id"], "", "", "", "", "");
    $CoachesController = new CoachesController();
    $CoachesController->delete($coach);

    header("Location: ../../../listOfCoaches.php");
?>