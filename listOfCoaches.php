<?php
    include 'app/includes/main.inc.php'; 
    
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of coachess</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/list.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="list">
        <h1>List of coaches</h1>
        <?php
            $coachObj = new coachView();
            $coachObj->list();
        ?>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>