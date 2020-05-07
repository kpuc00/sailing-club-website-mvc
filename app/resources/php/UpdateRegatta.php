<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $regatta = new Regatta($_POST["id"], $_POST["raceName"]);
    $RegattasController = new RegattasController();

    $RegattasController->update($regatta);

    header("Location: ../../../listOfRegattas.php");
?>