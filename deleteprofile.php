<?php
    include 'app/includes/main.inc.php'; 
?>

<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete profile</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/login.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Delete profile</h1>

        <?php echo "<img class='profilepic' src='app/storage/images/profilepictures/".$_SESSION['profilepicture']."'>"; ?>
        <h3><?=$_SESSION['displayname']?></h3>
        <h4>Hey, <?=$_SESSION['displayname']?>. We are sorry that you are leaving our club. If you delete your account, you cannot recover your data!</h4>

        <div class="form">

            <form action="app/resources/php/deleteProfile.php" method="post">
                <h3>Enter your password:</h3>

                <?php
                    if (isset($_SESSION['error'])) 
                    {
                        echo '<div class="error"><p>' . $_SESSION['error'] .'</p></div>';
                    }
			    ?>

                <hr>

                <input type="password" id="password" name="password" placeholder="Password" required>

                <hr>

                <input type="submit" name="submit" value="Delete profile">

            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>