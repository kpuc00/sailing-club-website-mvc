<?php
    include '../../includes/main.inc.php';

    $course = new Course($_POST["id"], "", "", "");
    $CoursesController = new CoursesController();
    $CoursesController->delete($course);

    header("Location: ../../../listOfCourses.php");
?>