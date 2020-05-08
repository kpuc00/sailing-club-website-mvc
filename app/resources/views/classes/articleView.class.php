<?php

    class articleView extends ArticlesController
    {

        public function __construct()
        {
            
        }

        public function ShowAll()
        {
            $result = $this->getArticles();

            echo "<div class='tableContainer'>";
            echo "<table>";

            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Type</th>";
                echo "<th>Title</th>";
                echo "<th>Author</th>";
                echo "<th>Editor</th>";
                echo "<th>Posted on</th>";
                echo "<th colspan='2'>Manage</th>";
            echo "</tr>";

            foreach ($result as $row) 
            {
                echo "<tr>";
                    echo "<td>" . $row['Id'] . "</td>";
                    echo "<td>" . $row['Type'] . "</td>";
                    echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Author'] . "</td>";
                    echo "<td>" . $row['Editor'] . "</td>";
                    echo "<td>" . $row['Timestamp'] . "</td>";

                    echo "<td>";
                        echo "<form action='app/resources/php/passArticleId.php?articleId=" . $row["Id"] . "' method='POST'>";
                            echo "<input type='submit' name='editArticle' value='Edit'/>";
                        echo "</form>";
                    echo "</td>";

                    echo "<td>";
                        echo "<form action='app/resources/php/deleteArticle.php?articleId=" . $row["Id"] . "' method='POST'>";
                            echo "<input type='submit' name='deleteArticle' value='Delete'/>";
                        echo "</form>";
                    echo "</td>";

                echo "</tr>";
            }

            echo "</table></div>";
        }

        public function ShowAboutPage($id)
        {
            $result = $this->getArticleById($id);

            foreach ($result as $row) 
            {
                echo $row['Content'];
            }
        }

        public function ShowNews()
        {
            $result = $this->getAllNews();

            if (empty($result)) {
                echo '<h2 class = "noNews">There are no news at this moment!</h2>';
            }

            foreach ($result as $row) 
            {
                echo "<div class='article'>";
                echo '<h3>' . $row['Title'] . '</h3><p> by <i class="fa fa-user"></i> ' . $row['Author'] . ', edited by <i class="fa fa-user"></i> ' . $row['Editor'] . ' on <i class="fa fa-history"></i> ' . $row['Timestamp'] .'</p><hr>';
                echo $row['Content'];
                echo "</div>";
            }
        }

        public function ShowById($id)
        {
            $result = $this->getArticleById($id);

            foreach ($result as $row) 
            {
                echo "<div class='article'>";
                echo '<h3>' . $row['Title'] . '</h3><p> by <i class="fa fa-user"></i> ' . $row['Author'] . ', edited by <i class="fa fa-user"></i> ' . $row['Editor'] . ' on <i class="fa fa-history"></i> ' . $row['Timestamp'] .'</p><hr>';
                echo $row['Content'];
                echo "</div>";
            }
        }

        public function ShowByTitle($title)
        {
            $result = $this->getArticleByTitle($title);

            foreach ($result as $row) 
            {
                echo "<div class='article'>";
                echo '<h3>' . $row['Title'] . '</h3><p> by <i class="fa fa-user"></i> ' . $row['Author'] . ', edited by <i class="fa fa-user"></i> ' . $row['Editor'] . ' on <i class="fa fa-history"></i> ' . $row['Timestamp'] .'</p><hr>';
                echo $row['Content'];
                echo "</div>";
            }
        }

    }

?>