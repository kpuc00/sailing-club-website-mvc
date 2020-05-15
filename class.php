<?php 
    include 'app/includes/main.inc.php';

    $courseView = new courseView();
    $coachView = new coachView();

    $course = $courseView->viewCourse($_GET["courseId"]);
    $coach = $coachView->viewCoachByCourseId($_GET["courseId"]);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Class</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/class.css">
    </head>
    <body>
        
        <!-- Navigation Bar -->
        <?php include 'app/resources/views/layout/navbar.php'; ?>

        <div class="class_content">

            <!-- Course Section Start -->
            <div class="class_title">
                <?php echo $course->getName(); ?>
            </div>

            <div class="class_logo">
                <img src='app/storage/images/course-img/<?php echo $course->getLogo(); ?>'>
            </div>

            <div class="class_description">
                <p><?php echo $course->getDescription(); ?></p>
            </div>

            <div class="timetable">
                <p id="timetableTitle">Timetable</p>
                <ul>
                    <li>Monday : 10:00-11:30</li>
                    <li>Tuesday : 10:00-11:30</li>
                    <li>Wednsday : 10:00-11:30</li>
                    <li>Thursday : 10:00-11:30</li>
                    <li>Friday : 10:00-11:30</li>
                    <li>Saturday : 10:00-11:30</li>
                    <li>Sunday : 10:00-11:30</li>
                </ul>
            </div>
            <!-- Course Section End  -->

            <hr>
            
            <!-- Coach Section start -->
            <div class="coach_content">
                <div class="coach_picture">
                    <img src="app/storage/images/coach-img/<?php echo $coach->getPicture(); ?>" alt="" height="200" width="200">
                    <h4>Coach of this class:</h4>
                    <p><?php echo $coach->getFirstName() . " " . $coach->getLastName(); ?></p>
                </div>

                <div class="coach_description">
                    <p><?php echo $coach->getDescription(); ?></p>
                </div>
                
            </div>
            <!-- Coach Section End -->
        </div>

        <!-- Footer -->
        <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
        </footer>

    </body>
</html>