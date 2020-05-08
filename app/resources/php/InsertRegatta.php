<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $regatta = new Regatta(0, $_POST["raceName"]);
    $RegattasController = new RegattasController();

    $RegattasController->create($regatta);

    header("Location: ../../../listOfRegattas.php");
?>