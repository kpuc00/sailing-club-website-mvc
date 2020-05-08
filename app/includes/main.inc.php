<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    session_start();

    include "$path/public_html/app/includes/controllerAutoLoader.inc.php";
    include "$path/public_html/app/includes/databaseAutoLoader.inc.php";
    include "$path/public_html/app/includes/modelAutoLoader.inc.php";
    include "$path/public_html/app/includes/viewAutoLoader.inc.php";
?>