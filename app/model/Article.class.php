<?php

    class Article extends DataBaseConnection 
    {    
        //Properties
        protected $id;
        protected $title;
        protected $author;
        protected $editor;
        protected $timestamp;
        protected $content;

        //id
        public function getId() { return $this->id; }

        protected function setId($id) { $this->id = $id; }

        //title
        public function getTitle() { return $this->title; }

        protected function setTitle($title) { $this->title = $title; }

        //author
        public function getAuthor() { return $this->author; }

        protected function setAuthor($author) { $this->author = $author; }

        //author
        public function getEditor() { return $this->editor; }

        protected function setEditor($editor) { $this->editor = $editor; }

        //author
        public function getTimestamp() { return $this->timestamp; }

        protected function setTimestamp($timestamp) { $this->timestamp = $timestamp; }

        //content 
        public function getContent() { return $this->content; }

        protected function setContent($content) { $this->content = $content; }

        //Methods
        public function __construcT($title, $author, $editor, $content)
        {
            $this->setTitle($title);
            $this->setAuthor($author);
            $this->setEditor($editor);
            $this->setContent($content);
        }

        //add article
        protected function add($article)
        {
            $sql = "INSERT INTO articles (Title, Author, Editor, Content) VALUES (?, ?, ?, ?)";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$article->getTitle(), $article->getAuthor(), $article->getAuthor(), $article->getContent()]);
        } 

        //delete article
        protected function delete($id)
        {
            $sql = "DELETE FROM articles WHERE id = ?";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }

        //Return all articles
        protected function getAll() 
        {
            $sql = "SELECT * FROM articles";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        //Return all articles in news
        protected function getNews() 
        {
            $sql = "SELECT * FROM articles WHERE Type = 'News' ORDER BY Timestamp DESC";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function getById($id) 
        {
            $sql = "SELECT * FROM articles WHERE Id = ?";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            
            return $stmt->fetchAll();
        }

        protected function getByTitle($title) 
        {
            $sql = "SELECT * FROM articles WHERE Title = ?";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title]);
            
            return $stmt->fetchAll();
        }

        protected function updateArticle($title, $content, $editor, $id)
        {
            $sql = "UPDATE articles SET Title = ?, Content = ?, Editor = ?, Timestamp = NOW() WHERE Id = ?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $content, $editor, $id]); 
            $stmt->closeCursor();
        }

    }

?>