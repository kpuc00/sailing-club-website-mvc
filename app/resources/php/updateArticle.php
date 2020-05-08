<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $articleId = $_SESSION['articleId'];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $editor = $_SESSION['displayname'];

        $ArticlesController = new ArticlesController();
        $ArticlesController->updateArticleData($title, $content, $editor, $articleId);
        $_SESSION['articleId'] = null;

        header('Location: ../../../articlemanager.php');
    }
?>