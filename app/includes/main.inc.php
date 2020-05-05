<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    session_start();

    include "$path/sailing-website-mvc/app/includes/controllerAutoLoader.inc.php";
    include "$path/sailing-website-mvc/app/includes/databaseAutoLoader.inc.php";
    include "$path/sailing-website-mvc/app/includes/modelAutoLoader.inc.php";
    include "$path/sailing-website-mvc/app/includes/viewAutoLoader.inc.php";
?>