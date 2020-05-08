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

        public function list()
        {
            $result = $this->getCoachNameLastName();
            
            foreach($result as $res) {
                echo '<table>';
                    echo '<tr>';
                        echo '<td>' . $res["coachName"] . " " . $res["coachLastName"] . '</td>';
                        echo '<td>' . '<a href="editCoach.php?coachId='. $res["coachID"].'" id="change">'. "Edit" .'</a>' . '</td>';
                        echo '<td>'. 
                                '<form action="app/resources/php/DeleteCoach.php" method="POST">'.
                                    '<input name="id" value="'.$res["coachID"].'" type="hidden">'.
                                    '<button id="delete" type="submit">'. 'Delete' . '</button>'
                                .'</form>'
                            .'</td>';
                    echo '</tr>';
                echo '</table>';
            }
            
        }

        public function listAvailableCoaches()
        {
            $result = $this->getAvailable();

            if($result != null) {
                foreach ($result as $c) {
                    echo '<option value="' . $c->getId() . '">' . $c->getFirstName(). ' ' . $c->getLastName() . '</option>';
                }
            }

        }
    
    }
?>