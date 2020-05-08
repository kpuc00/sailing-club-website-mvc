<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

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