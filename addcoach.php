<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add coach</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/add.css">

    <script type="text/javascript" src="app/resources/js/validation/validateCoachInput.js"></script>
</head>
<body>
    
<!-- Navigation Bar -->
<?php include 'app/resources/views/layout/navbar.php'; ?>

<div class="content">

    <h1>Add Coach</h1>

    <div class="form">

        <form action="app/resources/php/InsertCoach.php" method="POST"  enctype="multipart/form-data" onsubmit="return validate()">
            <h3>Enter the coach details:</h3>

            <hr>
            
            <input type="title" id="coachFirstName" name="coachFirstName" placeholder="First Name">  
            <div id="coachFirstNameError"></div>
            <input type="title" id="coachLastName" name="coachLastName" placeholder="Last Name">    
            <div id="coachLastNameError"></div>
            <textarea id="coachDescription" name="coachDescription" placeholder="Coach Description" style="height:200px"></textarea>
            <div id="coachDescriptionError"></div>
            <p>Choose picture</p>

            <input type="file" id="coachPicture" name="file" accept="image/x-png,image/gif,image/jpeg">     
            <div id="coachPictureError"></div>

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