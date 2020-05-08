<?php
    include '../../includes/main.inc.php';

    $contactID = $_GET["contactId"];

    $ContactFormController = new ContactFormController();
    $ContactFormController->deleteSelectedMessage($contactID);
    header('Location: ../../../messages.php');
?>