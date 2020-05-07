<?php
    include 'app/includes/main.inc.php';        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add race</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/add.css">
    
    <script type="text/javascript" src="javascript/validateRaceInput.js"></script>
</head>
<body>
    
<!-- Navigation Bar -->
<?php include 'app/resources/views/layout/navbar.php'; ?>

<div class="content">

    <h1>Add Race</h1>

    <div class="form">

        <form action="app/resources/php/InsertRegatta.php" method="POST">
            <h3>Enter the race details:</h3>

            <hr>
            
            <input type="title" id="raceName" name="raceName" placeholder="Title">      
            <div id="addRaceError"></div>
            <hr>

            <button type="submit">submit</button>
        
        </form>
    </div>

</div>

<!-- Footer -->
<footer>
    <?php include 'app/resources/views/layout/footer.php'; ?>
</footer>
</body>
</html>