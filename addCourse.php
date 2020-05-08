<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add class</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/add.css">
        <script type="text/javascript" src="app/resources/js/validation/validateClassInput.js"></script>
    </head>
    <body>
        
    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Add Class</h1>

        <div class="form">

            <form action="app/resources/php/InsertCourse.php" method="POST"  enctype="multipart/form-data" onsubmit="return validate()">
            <h3>Enter the class details:</h3>

            <hr>
            
            <input type="title" id="className" name="className" placeholder="Class Name"> 
            <div id="classNameError"></div>
            <textarea id="subject" id="classDescription" name="classDescription" placeholder="Class Description" style="height:200px"></textarea>
            <div id="classDescriptionError"></div>
            <br>
            <p>Choose picture</p>
            <input type="file" id="classPicture" name="file" accept="image/x-png,image/gif,image/jpeg"> 
            <div id="classPictureError"></div>

            <hr>

            <input type="submit" name="submit" value="Submit">

            </form>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>



    </body>
</html>