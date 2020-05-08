<?php
    include 'app/includes/main.inc.php'; 

    $articleObj = new articleView();
    $_SESSION['articleId'] = null;
?>

<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
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
    <title>Article Manager</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/articles.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>
     
    <div class="content">
        
        <h1>Article Manager</h1>
        
        <!-- Admin Nav Bar -->
        <?php include 'app/resources/views/layout/adminnav.php'; ?>
        
        <a class="addbtn" href="addarticle.php">Add</a>

        <?php $articleObj->ShowAll(); ?>        

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>