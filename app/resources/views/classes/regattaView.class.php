<?php

    class regattaView extends RegattasController 
    {
        public function __construct()
        {
            
        }

        public function viewRegattaIdName() 
        {
            $result = $this->getRegattaIdName();

            foreach($result as $r) {
                echo '<a href="regatta.php?regattaId='. $r["raceID"].'"> <i class="fa fa-ship"></i> '. $r["RaceName"] .'</a>';
            }
        }

        public function viewRegattaCompetitorsByRegattaId($id)
        {
            $competitors = $this->getRegattaCompetitorsByRegattaId($id);
            
            $index = 1;
            foreach($competitors as $competitor) {
                echo '<tr>';
                    echo '<td>'. $index . '</td>';
                    echo '<td>'. $competitor->getFirstName() .'</td>';
                    echo '<td>'. $competitor->getLastName() .'</td>';
                    echo '<td>'. $competitor->getAge() .'</td>';
                    echo '<td>'. $competitor->getClub() .'</td>';
                echo '</tr>';
                $index++;
            }
        }

        public function list() 
        {
            $result = $this->getRegattaIdName();

            foreach($result as $res) {
                echo '<table>';
                    echo '<tr>';
                        echo '<td>' . $res["RaceName"] . '</td>';
                        echo '<td>' . '<a href="editRegatta.php?regattaId='. $res["raceID"].'" id="change">'. "Edit" .'</a>' . '</td>';
                        echo '<td>'. 
                                '<form action="app/resources/php/DeleteRegatta.php" method="POST">'.
                                    '<input value='. $res["raceID"] .' type="hidden" name="id">'.
                                    '<button id="delete" type="submit">'. 'Delete' . '</button>'
                                .'</form>'
                            .'</td>';
                    echo '</tr>';
                echo '</table>';
            }

        } 

    }

?>