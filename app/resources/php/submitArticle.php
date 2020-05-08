<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/sailing-website-mvc/app/includes/main.inc.php";
    include "$path";

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