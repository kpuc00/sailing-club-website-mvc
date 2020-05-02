<?php

    class coachView extends CoachesController
    {
        public function __construct()
        {
            
        }

        public function viewCoachByCourseId($id) 
        {
            return $this->getCoachByCourseId($id);
        }

        public function coachList()
        {
            $result = $this->getCoachNameLastName();
           
            foreach($result as $res){
                echo "<table>";
                echo '<tr>';
                    echo '<td>'. $res["coachName"] . " " . $res["coachLastName"] . '</td>';  
                    echo '<td>' . "<button class='coachListButtons'>Delete</button>" . '</td>';
                    echo '<td>' . "<button class='coachListButtons'>Change</button>" . '</td>';
                echo "</tr>";
                echo "</table>";
            }
            
        }
    }

?>