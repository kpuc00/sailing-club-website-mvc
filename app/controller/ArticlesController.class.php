<?php 

    class ArticlesController extends Article
    {
        public function __construct()
        {
            
        }
        
        public function addArticle($article)
        {
            $this->add($article);
        }

        public function getArticles() 
        {
            return $this->getAll();
        }

        public function getAllNews() 
        {
            return $this->getNews();
        }

        public function getArticleById($id) 
        {
            return $this->getById($id);
        }

        public function getArticleByTitle($title) 
        {
            return $this->getByTitle($title);
        }

        public function updateArticleData($title, $content, $editor, $id) 
        {
            $this->updateArticle($title, $content, $editor, $id);
        }

        public function deleteArticle($id)
        {
            $this->delete($id);
        }
    }

?>