<?php
    include 'app/includes/main.inc.php';    
    $CoachesController = new CoachesController();
    $coach = $CoachesController->getCoachById($_GET["coachId"]);
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

        <form action="app/resources/php/UpdateCoach.php" method="POST"  enctype="multipart/form-data" onsubmit="return validate()">
            <h3>Enter the coach details:</h3>
            <hr>
            
            <input type="title" id="coachFirstName" name="coachFirstName" placeholder="First Name" value="<?php echo $coach->getFirstName(); ?>">
            <div id="coachFirstNameError"></div>
            <input type="title" id="coachLastName" name="coachLastName" placeholder="Last Name" value="<?php echo $coach->getLastName(); ?>">    
            <div id="coachLastNameError"></div>
            <textarea id="coachDescription" name="coachDescription" placeholder="Coach Description" style="height:200px" value="<?php echo $coach->getDescription(); ?>"><?php echo $coach->getDescription(); ?></textarea>
            <div id="coachDescriptionError"></div>
            <p>Choose picture</p>
            <input type="file" id="coachPicture" name="file" accept="image/x-png,image/gif,image/jpeg" value="<?php echo $coach->getPicture(); ?>">     
            <div id="coachPictureError"></div>
            
            <hr>

            <input name="id" type="hidden" value="<?php echo $coach->getId(); ?>">
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