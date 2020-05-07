<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    session_start();

    include "$path/mvc-model/app/includes/controllerAutoLoader.inc.php";
    include "$path/mvc-model/app/includes/databaseAutoLoader.inc.php";
    include "$path/mvc-model/app/includes/modelAutoLoader.inc.php";
    include "$path/mvc-model/app/includes/viewAutoLoader.inc.php";
?>