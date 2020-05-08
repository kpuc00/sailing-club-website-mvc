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

//If the user is not an administrator redirect to homepage...
if ($_SESSION['usertype'] == "User") {
    exit('<title>403</title><h1>Forbidden</h1>');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add article</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/articles.css">
    <script type="text/javascript" src="app/resources/js/validation/validateArticle.js"></script>
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Add article</h1>

        <!-- Admin Nav Bar -->
        <?php include 'app/resources/views/layout/adminnav.php'; ?>

        <h3>Hi <?= $_SESSION['displayname'] ?>. Have a good time writing this article!</h3>

        <div class="form">
            <form action="app/resources/php/submitArticle.php" method="POST" onsubmit="return validate()">
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