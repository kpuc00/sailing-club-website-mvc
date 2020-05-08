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
    <title>Change password</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/login.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Change password</h1>

        <div class="form">

            <form action="app/resources/php/changePassword.php" method="post">
                <h3>Enter your new password:</h3>

                <?php
                    if (isset($_SESSION['error'])) 
                    {
                        echo '<div class="error"><p>' . $_SESSION['error'] .'</p></div>';
                    }
			    ?>

                <hr>

                <input type="password" id="oldPassword" name="oldPassword" placeholder="Old password" required>

                <input type="password" id="newPassword" name="newPassword" placeholder="New password" required>

                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm new password" required>

                <hr>

                <input type="submit" name="submit" value="Change password">

            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>