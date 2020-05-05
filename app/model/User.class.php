<?php

    class User extends DataBaseConnection 
    {
        //Properties 
        protected $id;
        protected $username;
        protected $email;
        protected $displayName;
        protected $profilePicture;
        protected $userType;
        protected $registerDate;
        protected $lastLogin;
        protected $password;

        //id
        public function getId() { return $this->id; }

        protected function setId($id) { $this->id = $id; }

        //username
        public function getUsername() { return $this->username; }

        protected function setUsername($username) { $this->username = $username; }

        //email
        public function getEmail() { return $this->email; }

        protected function setEmail($email) { $this->email = $email; }

        //displayName
        public function getDisplayName() { return $this->displayName; }

        protected function setDisplayName($displayName) { $this->displayName = $displayName; }

        //profilePicture
        public function getProfilePicture() { return $this->profilePicture; }

        protected function setProfilePicture($profilePicture) { $this->profilePicture = $profilePicture; }

        //userType
        public function getUserType() { return $this->userType; }

        protected function setUserType($userType) { $this->userType = $userType; }

        //registerDate
        public function getRegisterDate() { return $this->registerDate; }

        protected function setRegisterDate($registerDate) { $this->registerDate = $registerDate; }

        //lastLogin
        public function getLastLogin() { return $this->lastLogin; }

        protected function setLastLogin($lastLogin) { $this->lastLogin = $lastLogin; }

        //password
        public function getPassword() { return $this->password; }

        protected function setPassword($password) { $this->password = $password; }

        //Methods
        public function __construct($id, $username, $displayName, $email, $userType, $profilePicture, $password) 
        {
            $this->setId($id);
            $this->setUsername($username);
            $this->setDisplayName($displayName);
            $this->setEmail($email);
            $this->setUserType($userType);
            $this->setProfilePicture($profilePicture);
            $this->setPassword($password);

        }

        protected function login($user) 
        {
            $sql = "SELECT id, password, displayname, usertype, profilepicture FROM accounts WHERE username = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user->getUsername()]);
            $stmt->bindColumn('id', $givenId);
            $stmt->bindColumn('password', $givenPassword);
            $stmt->bindColumn('displayname', $givenDisplayname);
            $stmt->bindColumn('usertype', $givenUsertype);
            $stmt->bindColumn('profilepicture', $givenProfilepicture);

            if ($stmt->fetchColumn() > 0) 
            {
                if (password_verify($user->getPassword(), $givenPassword))
                {
                    $user->setId($givenId);
                    $user->setDisplayName($givenDisplayname);
                    $user->setUserType($givenUsertype);
                    $user->setProfilePicture($givenProfilepicture);
                    $stmt->closeCursor();

                    $sql = "UPDATE accounts SET lastlogin = NOW() WHERE id = ?";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute([$user->getId()]);
                    $stmt->closeCursor();

                    $this->saveUserDataToSession($user);
                }
            }
        }

        protected function register($user) 
        {
            $sql = "SELECT id FROM accounts WHERE username = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user->getUsername()]);

            if ($stmt->fetchColumn() < 1) 
            {
                $stmt->closeCursor();
                $sql = "INSERT INTO accounts (username, password, email, displayname) VALUES (?, ?, ?, ?)";

                $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$user->getUsername(), $hashedPassword, $user->getEmail(), $user->getDisplayName()]);
                $stmt->closeCursor();

                $sql = "SELECT id, usertype, profilepicture FROM accounts WHERE username = ?";

                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$user->getUsername()]);
                $stmt->bindColumn('id', $givenId);
                $stmt->bindColumn('usertype', $givenUsertype);
                $stmt->bindColumn('profilepicture', $givenProfilepicture);

                $user->setId($givenId);
                $user->setUserType($givenUsertype);
                $user->setProfilePicture($givenProfilepicture);
                $stmt->closeCursor();

                $this->login($user);
            }
        }

        protected function saveUserDataToSession($user)
        {
            session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['id'] = $user->getId();
			$_SESSION['username'] = $user->getUsername();
			$_SESSION['displayname'] = $user->getDisplayName();
            $_SESSION['usertype'] = $user->getUserType();
            $_SESSION['profilepicture'] = $user->getProfilePicture();
        }

        protected function logout()
        {
            session_destroy();
        }

        public function getAll() 
        {

        }

        public function getUser()
        {

        }





    }

?>