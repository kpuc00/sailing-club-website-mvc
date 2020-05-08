<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION['articleId'] = $_GET["articleId"];

        header('Location: ../../../editarticle.php');
    }
?>