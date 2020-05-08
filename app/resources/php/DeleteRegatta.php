<?php
    include '../../includes/main.inc.php';

    $regatta = new Regatta($_POST["id"], "");
    $RegattasController = new RegattasController();
    $RegattasController->delete($regatta);  

    header("Location: ../../../listOfRegattas.php");
?>