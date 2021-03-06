<?php
    include 'app/includes/main.inc.php'; 
?>

<?php
//If the user is logged in redirect to the index page...
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/login.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Register</h1>

        <div class="form">

            <form action="app/resources/php/registerUser.php" method="post">
                <h3>Enter your personal data:</h3>

                <?php
                    if (isset($_SESSION['error'])) 
                    {
                        echo '<div class="error"><p>' . $_SESSION['error'] .'</p></div>';
                    }
			    ?>

                <hr>

                <input type="username" id="username" name="username" placeholder="Username" required>

                <input type="text" id="displayname" name="displayname" placeholder="Display name" required>

                <input type="email" id="email" name="email" placeholder="E-mail" required>

                <input type="tel" id="phone" name="phone" placeholder="Phone" required>

                <input type="password" id="password" name="password" placeholder="Password" required>

                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm password" required>

                <hr>

                <input type="submit" name="submit" value="Register">
                <h3>Already registered? <a href='login.php'>Login</a></h3>

            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>