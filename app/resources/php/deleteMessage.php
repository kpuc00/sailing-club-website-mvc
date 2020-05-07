<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    $contactID = $_GET["contactId"];

    $ContactFormController = new ContactFormController();
    $ContactFormController->deleteSelectedMessage($contactID);
    header('Location: ../../../messages.php');
?>