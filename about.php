<?php
    include 'app/includes/main.inc.php';
    
    $articleObj = new articleView();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>About us</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/about.css">
    </head>

    <body>
        <!-- Navigation Bar -->
        <?php include 'app/resources/views/layout/navbar.php'; ?>

        <div class="content">

            <h1>About us</h1>

            <div class="leftColumn">

            <?php $articleObj->ShowAboutPage(1); ?>

            </div>

            <div class="rightColumn">
                <img src="app/storage/images/page-img/SCF.png" alt="SCF Logo">
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
        </footer>

    </body>
</html>