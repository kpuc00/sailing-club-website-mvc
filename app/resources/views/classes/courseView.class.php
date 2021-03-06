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

        public function list()
        {
            $result = $this->getCourseIdName();
           
            foreach($result as $res) {
                echo '<table>';
                    echo '<tr>';
                        echo '<td>' . $res["ClassName"] . '</td>';
                        echo '<td>' . '<a href="editCourse.php?courseId='. $res["classID"].'" id="change">'. "Edit" .'</a>' . '</td>';
                        echo '<td>'. 
                                '<form action="app/resources/php/DeleteCourse.php" method="POST">'.
                                    '<input value='. $res["classID"] .' type="hidden" name="id">'.
                                    '<button id="delete" type="submit">'. 'Delete' . '</button>'
                                .'</form>'
                            .'</td>';
                    echo '</tr>';
                echo '</table>';
            }
            
        }



    }

?>