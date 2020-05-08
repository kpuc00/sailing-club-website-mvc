<?php
    include '../../includes/main.inc.php';

    $regatta = new Regatta($_POST["id"], $_POST["raceName"]);
    $RegattasController = new RegattasController();

    $RegattasController->update($regatta);

    header("Location: ../../../listOfRegattas.php");
?>