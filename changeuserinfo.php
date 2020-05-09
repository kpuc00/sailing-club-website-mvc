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
    <title>Change user information</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/login.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Change user information</h1>

        <?php echo "<img class='profilepic' src='app/storage/images/profilepictures/".$_SESSION['profilepicture']."'>"; ?>
	    <h3><?=$_SESSION['displayname']?></h3>

        <div class="changeform">

            <form action="app/resources/php/changeUserInfo.php" method="post">
                <h3>Enter your new password:</h3>

                <?php
                    if (isset($_SESSION['error'])) 
                    {
                        echo '<div class="error"><p>' . $_SESSION['error'] .'</p></div>';
                    }
			    ?>

                <hr>

                <label for="Username">Username (You cannot change that)</label>
                <input type="username" id="username" name="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" disabled>

                <label for="displayname">Display name</label>
                <input type="text" id="displayname" name="displayname" placeholder="Display name" value="<?php echo $_SESSION['displayname']; ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo $_SESSION['email']; ?>"required>

                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone" value="<?php echo $_SESSION['phone']; ?>" required>

                <hr>

                <input type="submit" name="submit" value="Change data">

            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>