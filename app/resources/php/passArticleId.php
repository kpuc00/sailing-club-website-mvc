<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION['articleId'] = $_GET["articleId"];

        header('Location: ../../../editarticle.php');
    }
?>