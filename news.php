<?php
    include 'app/includes/main.inc.php'; 

    $articleObj = new articleView();
    $_SESSION['articleId'] = null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>News</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/articles.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>
     
    <div class="newsContent">
        
        <h1 class = "newsHeader">SC Fontys News</h1>

        <?php $articleObj->ShowNews(); ?>        

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>