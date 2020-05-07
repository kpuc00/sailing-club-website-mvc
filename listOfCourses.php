<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of Classes</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/list.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="list">
        <h1>List of classes</h1>
        <?php
            $courseObj= new courseView();
            $courseObj->list();
        ?>
    </div>

    <!-- popup -->
    <div class="popup">
        <div class="popup-content">
            <form action="">
                <!-- code -->
            </form>
        </div>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>