<?php 

    class Regatta extends DataBaseConnection 
    {
        //Properties
        private $id;
        private $name;

        //id
        public function getId() { return $this->id; }

        protected function setId($id) { $this->id = $id; } 

        //regattaName
        public function getName() { return $this->name; }

        protected function setName($regattaName) { $this->name = $name; }

        public function __construct($id, $name)
        {
            $this->setId($id);
            $this->setName($name);
        }

        protected function getAll()
        {

        }

        protected function getRegattaById($id)
        {
            $sql = "SELECT * FROM races WHERE raceID = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt = execute([$id]);

            return $stmt->fetchAll();
        }

        protected function getRegattaCompetitorsByRegattaId($id)
        {
            $sql = "SELECT * FROM competitors WHERE raceID = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetchAll();
        } 

        protected function getIdName() 
        {
            $sql = "SELECT raceID, RaceName FROM races;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function updateName($name,$id)
        {
            $sql = "UPDATE races SET RaceName = ? WHERE raceID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name,$id]); 
        }

    }

?>