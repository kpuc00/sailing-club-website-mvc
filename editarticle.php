<?php
    include 'app/includes/main.inc.php'; 

    $articleObj = new articleView();
?>

<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// If there is no article id passed, redirect to article page
if (!isset($_SESSION['articleId'])) {
    header('Location: articlemanager.php');
    exit;
}

//If the user is not an administrator redirect to homepage...
if ($_SESSION['usertype'] != "Admin") {
    exit('<title>403</title><h1>Forbidden</h1>');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit article</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/articles.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Edit article</h1>

        <p>
        <!-- Admin Nav Bar -->
        <?php include 'app/resources/views/layout/adminnav.php'; ?>
        </p>

        <p>
            <?php $articleObj->ShowById($_SESSION['articleId']); ?>
        </p>

        <div class="form">
            <form action="app/resources/php/updateArticle.php" method="POST">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title..." value="" required>

                <label for="content">Content</label>
                <textarea id="content" name="content" placeholder="Content here.." style="height:200px" required></textarea>

                <input type="submit" value="Submit" >
            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>