<?php

    class CoachesController extends Coach
    {
        public function __construct()
        {
            
        }
        
        public function getCoachById($id) 
        {
            $result = parent::getCoachById($id);
            $coach = new Coach($result[0]["coachID"], $result[0]["coachName"], $result[0]["coachLastName"], $result[0]["coachPicture"], $result[0]["coachDescription"], $result[0]["classID"]);
            return $coach;
        }

        public function getCoachByCourseId($id) 
        {
            $result = parent::getCoachByCourseId($id);
            $coach = null;
            if ($result == null) {
                $coach = new Coach("Not Available", "Not Available", "Not Available", "Not Available", "Not Available", "Not Available");
            } else {
                $coach = new Coach($result[0]["coachID"], $result[0]["coachName"], $result[0]["coachLastName"], $result[0]["coachPicture"], $result[0]["coachDescription"], $result[0]["classID"]);
            }

            return $coach;
        }

        public function getCoachNameLastName()
        {
            return $this->getNameLastName();
        }

        public function updateNameLastName($name,$lastName,$id)
        {
            return $this->updateNameLastName($name,$lastName,$id);
        }


        public function getAvailable()
        {
            $result = parent::getAvailable();


            if ($result != null) {
                $coaches = [count($result)];

                $i = 0;
                foreach ($result as $res) {
                    $coaches[$i] = new Coach($result[$i]["coachID"], $result[$i]["coachName"], $result[$i]["coachLastName"], $result[$i]["coachPicture"], $result[$i]["coachDescription"], $result[$i]["classID"]);
                    $i++;
                }
    
                return $coaches;
            }

            return null;

        }

        public function updateCoachCourse($coach, $courseId) 
        {
            parent::updateCoachCourses($coach, $courseId);
        }
        
        public function create($coach)
        {
            parent::create($coach);
        }

        public function update($coach)
        {
            parent::update($coach);
        }

        public function delete($coach)
        {
            parent::delete($coach);
        }

    }

?>