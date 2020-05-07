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
        protected $error;

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

        //error
        public function getError() { return $this->error; }

        protected function setError($error) { $this->error = $error; }

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
            $sql = "SELECT * FROM accounts WHERE username = ?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user->getUsername()]);
            $stmt->bindColumn('id', $givenId);
            $stmt->bindColumn('password', $givenPassword);
            $stmt->bindColumn('email', $givenEmail);
            $stmt->bindColumn('displayname', $givenDisplayname);
            $stmt->bindColumn('profilepicture', $givenProfilepicture);
            $stmt->bindColumn('usertype', $givenUsertype);
            $stmt->bindColumn('registerdate', $givenRegisterdate);            

            if ($stmt->fetchColumn() > 0) 
            {
                if (password_verify($user->getPassword(), $givenPassword))
                {
                    $user->setId($givenId);
                    $user->setEmail($givenEmail);
                    $user->setDisplayName($givenDisplayname);
                    $user->setProfilePicture($givenProfilepicture);
                    $user->setUserType($givenUsertype);
                    $user->setRegisterDate($givenRegisterdate);
                    $stmt->closeCursor();

                    $sql = "CALL UpdateUserLastLogin('$givenId')";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute();
                    $stmt->closeCursor();

                    $sql = "CALL GetUserLastLogin('$givenId')";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute();
                    $givenLastlogin = $stmt->fetchColumn();
                    $stmt->bindColumn('lastlogin', $givenLastlogin);
                    $user->setLastLogin($givenLastlogin);
                    $stmt->closeCursor();

                    $this->saveUserDataToSession($user);
                }

                else 
                {
                    $user->setError("Incorrect password!");
                }
            }

            else 
            {
                $user->setError("Incorrect username/password!");
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
            $_SESSION['email'] = $user->getEmail();
			$_SESSION['displayname'] = $user->getDisplayName();
            $_SESSION['profilepicture'] = $user->getProfilePicture();
            $_SESSION['usertype'] = $user->getUserType();
            $_SESSION['registerdate'] = $user->getRegisterDate();
            $_SESSION['lastlogin'] = $user->getLastLogin();
        }
        
        protected function logout()
        {
            session_destroy();
        }

        protected function getErrors($user)
        {
            return $user->getError();
        }

        protected function getUser($givenId)
        {
            $sql = "SELECT * FROM accounts WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$givenId]);

            return $stmt->fetchAll();
        }

        protected function getAll() 
        {
            $sql = "SELECT id, username, email, usertype, lastlogin, profilepicture FROM accounts ORDER BY id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function makeUser($givenId)
        {
            $sql = "CALL MakeUser('$givenId')";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }

        protected function makeAdmin($givenId)
        {
            $sql = "CALL MakeAdmin('$givenId')";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }

        protected function deleteUser($givenId)
        {
            $sql = "CALL DeleteUser('$givenId')";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }

        protected function changeProfilePic($givenId, $givenPicName)
        {
            $sql = "UPDATE accounts SET profilepicture = ? WHERE id = $givenId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$givenPicName]);
        }

        protected function resetProfilePic($givenId)
        {
            $sql = "UPDATE accounts SET profilepicture = DEFAULT WHERE id = $givenId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }

        protected function getMichaelPicture(){
            $sql = "CALL GetMichaelGProfilePicture()";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function getKrisPicture(){
            $sql = "CALL GetKrisProfilePicture()";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

?>