<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of regattas</title>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/list.css"> 
    <link rel="stylesheet" type="text/css" href="app/resources/css/form-popup.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <!-- content -->
    <div class="list">
        <h1>List of regattas</h1>
        <?php
            $regattaObj = new regattaView();
            $regattaObj->list();
        ?>
    </div>

    <!-- popup -->
    <div class="popup">
        <div class="popup-content">
            <form action="app/resources/php/InsertRegatta.php" method="POST">
            <h3>Enter the race details:</h3>
                <hr>
                <input type="title" id="title" name="title" placeholder="Title">      
                <hr>

                <button type="submit">submit</button>
           
            </form>
            
            <br>
            <button type="submit" class="popup-hide">cancel</button>            
        </div>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="app/resources/js/animation/popup.js"></script>
</html>