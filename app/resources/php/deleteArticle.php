<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $articleId = $_GET["articleId"];
        $ArticlesController = new ArticlesController();
        $ArticlesController->deleteArticle($articleId);
        header('Location: ../../../articlemanager.php');
    }
?>