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
                        echo '<td>' . "<button id='change'>Change</button>" . '</td>';
                        echo '<td>'. 
                                '<form action="" method="POST">'.
                                    '<button id="delete" type="submit">'. 'Delete' . '</button>'
                                .'</form>'
                            .'</td>';
                    echo '</tr>';
                echo '</table>';
            }
            
        }
    }

?>