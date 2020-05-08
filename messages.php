<?php
    include 'app/includes/main.inc.php'; 

    $contactObj = new contactView();
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
    <title>Messages</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/messages.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Messages</h1>

        <div class="messages">

            <!-- Admin Nav Bar -->
            <?php include 'app/resources/views/layout/adminnav.php'; ?>
            
            <h3>Messages sent from "Contact me" page:</h3>

            <?php $contactObj->populateTableWithMessages(); ?>
            
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>