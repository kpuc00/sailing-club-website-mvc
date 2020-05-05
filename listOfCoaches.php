<?php
    include 'app/includes/main.inc.php'; 
    
    $coachObj = new coachView();
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of coachess</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/listOfCoaches.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="listOfCoaches">
        <h1>List of coaches</h1>
        <?php
        $coachObj->coachList();
        ?>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>