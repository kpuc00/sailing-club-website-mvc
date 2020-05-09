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

        public function changeUserPassword($id, $newPassword)
        {
            $this->changePassword($id, $newPassword);
        }

        public function checkUserPassword($id, $givenPassword)
        {
            $this->checkPassword($id, $givenPassword);
        }

        public function changeUserData($id, $displayname, $email, $phone)
        {
            $this->changeData($id, $displayname, $email, $phone);
        }

        public function deleteUser($id)
        {
            $this->delete($id);
        }
        
        public function logoutUser()
        {
            $this->logout();
        }
        
        public function checkForErrors($user)
        {
            return $this->getErrors($user);
        }

        public function getAllUsers()
        {
            return $this->getAll();
        }

        public function getUserData($id)
        {
            return $this->getUser($id);
        }

        public function userSetUser($id)
        {
            $this->makeUser($id);
        }

        public function userSetAdmin($id)
        {
            $this->makeAdmin($id);
        }

        public function userDeleteUser($id)
        {
            $this->deleteUser($id);
        }

        public function updateProfilePic($id, $picName)
        {
            $this->changeProfilePic($id, $picName);
        }

        public function removeProfilePic($id)
        {
            $this->resetProfilePic($id);
        }

        public function getMichaelProfilePic(){
            return $this->getMichaelPicture();
        }

        public function getKrisProfilePic(){
            return $this->getKrisPicture();
        }
    }

?>