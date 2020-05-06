<?php

    class courseView extends CoursesController
    {

        public function __construct()
        {
            
        }

        public function viewCourses()
        {
            $result = $this->getCourses();

            foreach($result as $course) {
                include 'app/resources/views/layout/infobox.php';
            }
        }

        public function viewCourse($id)
        {
            return $this->getCourse($id);
        }

        public function viewCourseIdName() 
        {
            $result = $this->getCourseIdName();

            foreach($result as $r) {
                echo '<a href="class.php?courseId='. $r["classID"].'"> <i class="fa fa-file"></i> '. $r["ClassName"] .'</a>';
            }
        }

        public function courseList()
        {
            $result = $this->getCourseIdName();
           
            foreach($result as $res){
                echo "<table>";
                echo '<tr>';
                    echo '<td>'. $res["ClassName"] . '</td>';  
                    echo '<td>' . "<button class='courseListButtons'>Delete</button>" . '</td>';
                    echo '<td>' . "<button class='courseListButtons'>Change</button>" . '</td>';
                echo "</tr>";
                echo "</table>";
            }
            
        }

    }

?>