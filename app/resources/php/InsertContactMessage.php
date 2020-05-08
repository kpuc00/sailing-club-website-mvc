<?php
    include '../../includes/main.inc.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];

    $message = new Message(0, $name, $email, $phone, $subject);

    $ContactFormController = new ContactFormController();
    $ContactFormController->insertMessage($message);
    $_SESSION['success'] = "Your message has been sent. We will respond you soon!";

    header("Location: ../../../contact.php");
?>