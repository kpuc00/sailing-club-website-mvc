<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mvc-model/app/includes/main.inc.php";
    include "$path";

    $logo = $_FILES["file"]["name"];
    if ($logo == null) {
        $logo = "default.png";
    }

    $course = new Course(0, $_POST["className"], $_POST["classDescription"], $logo);

    $CoursesController = new CoursesController();
    $CoursesController->create($course);

    $logoDestination = $_SERVER['DOCUMENT_ROOT'];
    $logoDestination .= "/mvc-model/app/storage/images/course-img";

    move_uploaded_file($logo, $logoDestination);
    
    header("Location: ../../../listOfCourses.php");
?>