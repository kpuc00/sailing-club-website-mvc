<?php
    include '../../includes/main.inc.php';

    $regatta = new Regatta(0, $_POST["raceName"]);
    $RegattasController = new RegattasController();

    $RegattasController->create($regatta);

    header("Location: ../../../listOfRegattas.php");
?>