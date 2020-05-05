<?php 

    class UsersController extends User 
    {
        public function __construct() 
        { 

        }

        public function registerUser($user)
        {
            $this->register($user);
        }

        public function authenticateUser($user)
        {
            $this->login($user);
        }

        public function saveUserToSession($user)
        {
            $this->saveUserDataToSession($user);
        }

        public function logoutUser()
        {
            $this->logout();
        }
    }

?>