<?php
    include 'app/includes/main.inc.php'; 

    $userObj = new userView();
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
    <title>Admin page</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/adminpage.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">
        <h1>Admin page</h1>

        <!-- Admin Nav Bar -->
        <?php include 'app/resources/views/layout/adminnav.php'; ?>

        <div class="leftColumn">            
            <h3>Welcome back, <?= $_SESSION['displayname'] ?>!</h3>
            <h3>List of registered users:</h3>
            <?php $userObj->usersList(); ?>
        </div>

        <div class="rightColumn">

        <?php echo "<img class='profilepic' src='app/storage/images/profilepictures/".$_SESSION['profilepicture']."'>";	?>

        <h3><?= $_SESSION['displayname'] ?></h3>
        <a class="button" href='profile.php' title='Profile'>Edit profile</a>

        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>