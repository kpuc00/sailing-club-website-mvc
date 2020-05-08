<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $course = new Course($_POST["id"], "", "", "");
    $CoursesController = new CoursesController();
    $CoursesController->delete($course);

    header("Location: ../../../listOfCourses.php");
?>