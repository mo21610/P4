<?php
    class PostManager {
        private $_db;

        public function __construct() {
            try // Connexion à la BDD
            {
                $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
        }

        // SessionInterface::class => object(className: PHPSession::class),


        // Récupération des post par ordre décroissant


        // Recuperation d'un seul post dans BDD
        public function getOnePost($id) {
            $req = $this->_db->query("SELECT id, title, post, DATE_FORMAT(date_post, '%d/%m/%Y à %Hh%imin%ss') AS date_post FROM admin WHERE id = " .$id);
            $dataPost = $req->fetch(PDO::FETCH_ASSOC);
            $postDataOne = new Post($dataPost);
            return $postDataOne;
        }

        // Recuperation de tout les posts
        public function getAllPosts(){
            $allPosts = [];
            $req = $this->_db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post FROM admin ORDER BY id DESC');
            while ($dataPost = $req->fetch(PDO::FETCH_ASSOC)) {
                $allPosts[] = new Post($dataPost);
            }
            return $allPosts;
        }

        // Suppression post
        public function deletePost($id) {
            $req = $this->_db->prepare('DELETE FROM admin WHERE id = :id ');
            $req->execute(array( 
                'id' => $id,
            ));
        }

        // Insertion post dans BDD
         public function addPost(Post $post){
            $req = $this->_db->prepare('INSERT INTO admin (title, post, date_post) VALUES(:title, :post, NOW())'); // Requête sans la partie variable
            $req->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
                'title' => $post->title(),
                'post' => $post->post(),
            ));
        }


        // Modification des posts
        public function updatePost(Post $post) {
            $reqEdit = $this->_db->prepare('UPDATE admin SET title = :title_edit, post = :post_edit WHERE id = :id');
            $reqEdit->execute(array(
        	'title_edit' => $post->title(),
        	'post_edit' => $post->post(),
            'id' => $post->id(),
            ));
        }

    }