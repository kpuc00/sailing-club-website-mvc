<?php
    include 'app/includes/main.inc.php';       
    $courseCont = new CoursesController();
    $course = $courseCont->getCourse($_GET["courseId"]);
    



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add class</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
        <link rel="stylesheet" type="text/css" href="app/resources/css/add.css">
    </head>
    <body>
        
    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

        <h1>Add Class</h1>

        <div class="form">

            <form action="app/resources/php/UpdateCourse.php" method="POST"  enctype="multipart/form-data">
            <h3>Enter the class details:</h3>

            <hr>
            
            <input type="title" id="className" name="className" placeholder="Class Name" value="<?php echo $course->getName(); ?>"> 
            <div id="classNameError"></div>
            <textarea id="subject" id="classDescription" name="classDescription" placeholder="Class Description" style="height:200px" value="<?php echo $course->getDescription(); ?>"><?php echo $course->getDescription(); ?></textarea>
            <div id="classDescriptionError"></div>
            <br>

            <label for="coaches">Select available coach</lable>
            <select id="coaches">
                <?php


                    $coachView = new coachView();
                    $coach = $coachView->viewCoachByCourseId($_GET["courseId"]);
                    if ($coach != null) {
                        echo '<option value="'. $coach->getId() .'" name="coachId" selected>'. $coach->getFirstName(). " " . $coach->getLastName()  .'</option>';
                    } else {
                        echo '<option value="" selected>'. "None" .'</option>';
                    }
                    $coachView->listAvailableCoaches();
                ?>
            </select>

            <br>

            <p>Choose picture</p>
            <input type="file" id="classPicture" name="classPicture" accept="image/x-png,image/gif,image/jpeg" value="<?php echo $course->getLogo(); ?>">
            <div id="classPictureError"></div>
            

            

            <input type="hidden" name="id" value="<?php echo $course->getId(); ?>">
            
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