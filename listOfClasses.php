<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of Classes</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/listOfClasses.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="listOfClasses">
        <h1>List of classes</h1>
        <?php
        $courseObj->courseList();
        ?>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>