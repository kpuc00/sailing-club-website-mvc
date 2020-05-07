<?php

    class Coach extends DataBaseConnection 
    {
        //Properties
        private $id;
        private $firstName;
        private $lastName;
        private $picture;
        private $description;
        private $courseId;

        //id
        public function getId() { return $this->id; }

        protected function setId($id) { $this->id = $id; }

        //firstName$firstName
        public function getFirstName() { return $this->firstName; }

        protected function setFirstName($firstName) { $this->firstName = $firstName; } 

        //lastName
        public function getLastName() { return $this->lastName; }

        protected function setLastName($lastName) { $this->lastName = $lastName; }

        //picture
        public function getPicture() { return $this->picture; }

        protected function setPicture($picture)  { $this->picture = $picture; }

        //description
        public function getDescription() { return $this->description; }

        protected function setDescription($description) { $this->description = $description; }

        //courseId
        public function getCourseId() { return $this->courseId; }

        protected function setCourseId($courseId) { $this->courseId = $courseId; }


        //Methods
        public function __construct($id, $firstName, $lastName, $picture, $description, $courseId) 
        {
            $this->setId($id);
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setPicture($picture);
            $this->setDescription($description);
            $this->setCourseId($courseId);
        }

        protected function getAll() 
        {

        }

        protected function getCoachById($id)
        {
            $sql = "SELECT * FROM coaches WHERE coachID = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetchAll();
        }

        protected function getCoachByCourseId($id)
        {
            $sql = "SELECT * FROM coaches WHERE classID = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetchAll();
        }

        protected function getNameLastName()
        {
            $sql = "SELECT coachID, coachName, coachLastName FROM coaches;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function updateNameLastName($name,$lastName,$id)
        {
            $sql = "UPDATE coaches SET coachName = ?, coachLastName = ?  WHERE coachID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name,$lastName,$id]); 
        }

        public  function getAvailable() 
        {
            $sql = "SELECT * FROM coaches WHERE classID = NULL";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function updateCoachCourses($coach, $courseId) 
        {
            $sql = "UPDATE coaches SET classID = ?  WHERE coachID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$courseId, $coach->getId()]);
        }

        protected function create($coach) 
        {
            $sql = "INSERT coaches (coachName, coachLastName, coachPicture, coachDescription) VALUES (?, ?, ?, ?);";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$coach->getFirstName(), $coach->getLastName(), $coach->getPicture(), $coach->getDescription()]);
        }

        protected function update($coach)
        {
            $sql = "UPDATE coaches SET coachName = ?, coachLastName = ?, coachPicture = ?, coachDescription = ?  WHERE coachID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$coach->getFirstName(), $coach->getLastName(), $coach->getPicture(), $coach->getDescription(), $coach->getId()]); 
        }

        protected function delete($coach) 
        {
            $sql = "DELETE FROM coaches WHERE coachID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$coach->getId()]);
        }
    }

?>
