<?php
    include '../../includes/main.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title = $_POST["title"];
        $author = $_SESSION['displayname'];
        $editor = $_SESSION['displayname'];
        $content = $_POST["content"];

        $article = new Article($title, $author, $editor, $content);
        $ArticlesController = new ArticlesController();
        $ArticlesController->addArticle($article);
        header('Location: ../../../articlemanager.php');
    }

?>