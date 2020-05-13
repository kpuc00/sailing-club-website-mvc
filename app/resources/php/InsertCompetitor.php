<?php
    include '../../includes/main.inc.php';
    
    $competitor = new Competitor(0, $_POST["firstName"], $_POST["lastName"], $_POST["age"], $_POST["club"], $_GET["regattaId"]);
    $RegattasController = new RegattasController();
    $RegattasController->AddCompetitor($competitor);

    header("Location: ../../../regatta.php?regattaId=".$_GET["regattaId"]);
?>