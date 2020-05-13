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

        protected function setName($name) { $this->name = $name; }

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
            $stmt->execute([$id]);

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

        protected function AddCompetitor($competitor) 
        {
            $sql = "INSERT INTO competitors (Name, LastName, Age, Club, raceID) VALUES (?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$competitor->getFirstName(), $competitor->getLastName(), $competitor->getAge(), $competitor->getClub(), $competitor->getRaceId()]);
        }

        protected function create($regatta) 
        {
            $sql = "INSERT INTO races (RaceName) VALUES (?);"   ;

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$regatta->getName()]);
        }
        
        protected function update($regatta)
        {
            $sql = "UPDATE races SET RaceName = ? WHERE raceID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$regatta->getName(), $regatta->getId()]); 
        }

        protected function delete($regatta) 
        {
            $sql = "DELETE FROM races WHERE raceID= ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$regatta->getId()]);
        }

    }

?>