<?php

    class Course extends DataBaseConnection 
    {    
        //Properties
        protected $id;
        protected $name;
        protected $description;
        protected $logo;

        //id
        public function getId() { return $this->id; }

        protected function setId($id) { $this->id = $id; }

        //name
        public function getName() { return $this->name; }

        protected function setName($name) { $this->name = $name; }

        //courseDescription 
        public function getDescription() { return $this->description; }

        protected function setDescription($description) { $this->description = $description; }

        //logo
        public function getLogo() { return $this->logo; }

        protected function setLogo($logo) { $this->logo = $logo; }

        //Methods
        public function __construcT($id, $name, $description, $logo)
        {
            $this->setId($id);
            $this->setName($name);
            $this->setDescription($description);
            $this->setLogo($logo);
        }

        //Return all courses
        public function getAll() 
        {
            $sql = "SELECT * FROM classes;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function getCourse($id) 
        {
            $sql = "SELECT * FROM classes WHERE classID = ?";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            
            return $stmt->fetchAll();
        }

        
        protected function getIdName()
        {
            $sql = "SELECT classID, ClassName FROM classes;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function create($course)
        {
            $sql = "INSERT classes (ClassName, ClassDescription, classLogo) VALUES (?, ?, ?);";

            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$course->getName(), $course->getDescription(), $course->getLogo()]);
        }

        protected function update($course)
        {
            $sql = "UPDATE classes SET ClassName = ?, ClassDescription = ?, classLogo = ?  WHERE classID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$course->getName(), $course->getDescription(), $course->getLogo(), $course->getId()]); 
        }

        protected function delete($course)
        {
            $sql = "UPDATE coaches SET classID = ? WHERE classID = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([null, $course->getId()]);


            $sql = "DELETE FROM classes WHERE classID = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$course->getId()]);
        }

    }

?>