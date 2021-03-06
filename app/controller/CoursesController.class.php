<?php

    class CoursesController extends Course 
    {
        public function __construct()
        {
            
        }
        
        public function getCourses() {
            $result = $this->getAll();
            $courses = array();
            
            $i = 0;
            foreach($result as $course) {
                array_push($courses, new Course($result[$i]['classID'], $result[$i]['ClassName'], $result[$i]['ClassDescription'], $result[$i]['classLogo']));
                $i++;
            }

            return $courses;
        }

        public function getCourse($id) 
        {
            $result = parent::getCourse($id);
            $course = new Course($result[0]["classID"], $result[0]["ClassName"], $result[0]["ClassDescription"], $result[0]["classLogo"]);

            return $course;
        }

        public function getCourseIdName() 
        {
            return $this->getIdName();
        }

        public function create($course)
        {
            parent::create($course);
        }

        public function update($course)
        {
            parent::update($course);
        }

        public function delete($course)
        {
            parent::delete($course);
        }



    }

?>