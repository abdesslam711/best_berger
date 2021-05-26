 <?php
    class ArticleDAO extends DAO
    {

        public function getArticles()
        {
            
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC LIMIT 0,1' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
       
        public function get_All_Article()
        {
            
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        
        public function blog()
        {
            $sql = 'SELECT id, title, images, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        public function about()
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
        
        public function getArticle($articleId)
        {
            $sql = 'SELECT id, title, images, content, author, createdAt FROM article WHERE id = ?';

            $query = $this->createQuery($sql,[$articleId]);
            $articleId = $query->fetchAll();
            
            return $articleId; 
        }
        public function add_article()
        {
                 
            if (isset($_POST["submit"])){ 
                if (!empty($_POST["title"]) && !empty($_FILES['images']['error'] == 0) && !empty($_POST["content"]) && !empty($_POST["author"])) {
                    
                    $title = htmlspecialchars($_POST['title']);
                    $images = file_get_contents($_FILES["images"]['tmp_name']);
                    $content = htmlspecialchars($_POST['content']);
                    $author = htmlspecialchars($_POST['author']);        
                    $sql = 'INSERT INTO article (title, images, content, author, createdAt) VALUES (?, ?, ?, ?, NOW())';
                    $_SESSION['add_article_erreur'] = "<span>Votre article à bien été ajouté.</span>";
                    return $this->createQuery($sql,[$title, $images, $content, $author]);
                   
                }else{
                    $_SESSION['add_article_erreur'] = "<span>tous les chemps doivent étre remplies.</span>";
                    return;
                }    
            }    
        } 
        
        public function edit_Article($POST, $articleId)
        {
           if(isset($_POST["title"], $_FILES["images"]['tmp_name'], $_POST["content"], $_POST["author"]) && !empty($_POST["title"]) && !empty($_FILES['images']['error'] == 0) && !empty($_POST["content"]) && !empty($_POST["author"]))
           {
                $sql = 'UPDATE article SET title=:title, images=:images, content=:content, author=:author WHERE id=:articleId';
                $_SESSION['modif_article_erreur'] = "<span>Votre article à été modifier.</span>";
                $this->createQuery($sql, [
                    'title' => $POST['title'],
                    'images' => file_get_contents( $_FILES['images']['tmp_name']),
                    'content' => $POST['content'],
                    'author' => $POST['author'],
                    'articleId' => $articleId
                ]);
            }else{
                $_SESSION['modif_article_erreur'] = "<span>tous les chemps doivent étre remplies.</span>";
                return;
                echo $erreur = "tous les chemps doivent être completés";
            }
        
        }
        public function deletarticle($articleId)
        {

            $sql = 'DELETE FROM article WHERE id = ?';
            $this->createQuery($sql, [$articleId]);
        }
        public function administration()
        {
            $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC ' ;
            $query = $this->createQuery($sql);
            $articles = $query->fetchAll();
            
            return $articles; 
        }
       
} 