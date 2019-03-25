<?php

    require"Manager.php";

    class CommentManager extends Manager {
        // private $_db;

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


        // Insertion commentaires dans BDD
        public function addComment(Comment $comment){
            $reqInsertComment = $this->_db->prepare('INSERT INTO comments (id_post, author, comment, date_comment, report) VALUES(:id_post, :author, :comment, NOW(), 0)'); // Requête sans la partie variable
            $reqInsertComment->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
                'id_post' => $comment->idPost(),
                'author' => $comment->author(),
                'comment' => $comment->comment(),
            ));
        }

        // Recuperation commentaires dans BDD
        public function getComment($id) {
            $comments = [];
            $req = $this->_db->prepare("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%imin%ss') AS date_comment, report FROM comments WHERE id_post = :id_post AND report = 0 ORDER BY date_comment");
            $req->execute(array(
            'id_post' => $id,
            ));
            while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                $comments[] = new Comment($data);
            }
            return $comments;
        }

        // Recuperation commentaires signalé
        public function getCommentReport() {
            var_dump($this);
                die();
            $commentsReport = [];
            $req = $this->_db->query("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%imin%ss') AS date_comment, report FROM comments WHERE report = 1 ORDER BY date_comment");
            while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
                $commentsReport[] = new Comment($data);
            }
            return $commentsReport;
        }

        // Suppression commentaire signalés BDD
        public function deleteComment($id) {
            $req = $this->_db->prepare('DELETE FROM comments WHERE id = :id ');
            $req->execute(array( 
            'id' => $id,
            ));

        }

        // Modification commentaires non signalé en signalé
        public function updateComment(Comment $comment) {
            $req = $this->_db->prepare('UPDATE comments SET report = 1 WHERE id = :id ');
            $req->execute(array( 
                'id' => $comment->id(),
            ));
        }

        // Modification commentaires signalé en non signalé
        public function updateCommentReport(Comment $comment) {
            $req = $this->_db->prepare('UPDATE comments SET report = 0 WHERE id = :id ');
            $req->execute(array( 
                'id' => $comment->id(),
            ));
        }

    }