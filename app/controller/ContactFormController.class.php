<?php 

    class ContactFormController extends Message
    {
        public function __construct()
        {
            
        } 

        public function insertMessage($message)
        {
            $this->create($message);
        }

        public function getAllMessages()
        {
            return $this->getAll();
        }

        public function deleteSelectedMessage($id)
        {
            $this->deleteMessage($id);
        }
    }

?>