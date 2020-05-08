<?php
    include '../../includes/main.inc.php';
    
    $logo = $_FILES["classPicture"]["name"];

    $course = new Course($_POST["id"], $_POST["className"], $_POST["classDescription"], $logo);

    $CoursesController = new CoursesController();
    $CoursesController->update($course);


    
    $logoDestination = $_SERVER['DOCUMENT_ROOT'];
    $logoDestination .= "/mvc-model/app/storage/images/course-img";

    move_uploaded_file($logo, $logoDestination);

    $coach = new Coach($_POST["coachId"], 0, 0, 0, 0, 0);
    $CoachesController = new CoachesController();
    $CoachesController->updateCoachCourse($coach, $_POST["id"]);

    
    header("Location: ../../../listOfCourses.php");
?>