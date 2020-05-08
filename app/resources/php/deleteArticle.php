<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $articleId = $_GET["articleId"];
        $ArticlesController = new ArticlesController();
        $ArticlesController->deleteArticle($articleId);
        header('Location: ../../../articlemanager.php');
    }
?>