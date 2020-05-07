<?php

    class RegattasController extends Regatta 
    {
        public function __construct() 
        {

        }

        public function GetRegattaById($id) 
        {
            $regatta = parent::getRegattaById($id);

            return new Regatta($regatta[0]["raceID"], $regatta[0]["RaceName"]);

        }
        
        protected function getRegattaIdName()
        {
            return $this->getIdName();
        }

        protected function getRegattaCompetitorsByRegattaId($id)
        {
            $result = parent::getRegattaCompetitorsByRegattaId($id);

            $competitors = [count($result)];
            $i = 0;
            foreach($result as $r) {
                $competitors[$i] = new Competitor($r["competitorID"], $r["Name"], $r["LastName"], $r["Age"], $r["Club"], $r["raceID"]);
            }

            return $competitors;
        }

        protected function updateName($name,$id)
        {
            return $this->updateName($name,$id);
        }

    }

?>