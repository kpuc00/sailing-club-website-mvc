<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $regatta = new Regatta($_POST["id"], "");
    $RegattasController = new RegattasController();
    $RegattasController->delete($regatta);  

    header("Location: ../../../listOfRegattas.php");
?>