<?php
class PostManager {
    private $db;
    public function __construct() {
        try // Connexion à la BDD
        {
            $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            // $this->db = new PDO('mysql:host=db5000040901.hosting-data.io;dbname=dbs35913', 'dbu88387', '!Z4vpfh21000');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    }
    public function getPost($id) {
        $req = $this->db->prepare("SELECT id, title, post, DATE_FORMAT(date_post, '%d/%m/%Y à %Hh%i') AS date_post FROM admin WHERE id = :id ");
        $req->execute(array( 
            'id' => $id,
        ));
        $dataPost = $req->fetch(PDO::FETCH_ASSOC);
        if($dataPost) {
            $postDataOne = new Post($dataPost);
            return $postDataOne;
        }
        else {
            return false;
        }       
    }
    public function getPosts(){
        $allPosts = [];
        $req = $this->db->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin\') AS date_post FROM admin ORDER BY id DESC');
        $req->execute(array());
        while ($dataPost = $req->fetch(PDO::FETCH_ASSOC)) {
            $allPosts[] = new Post($dataPost);
        }
        return $allPosts;
    }
    public function deletePost($id) {
        $req = $this->db->prepare('DELETE FROM admin WHERE id = :id ');
        $req->execute(array( 
            'id' => $id,
        ));
    }
    public function addPost(Post $post){
        $req = $this->db->prepare('INSERT INTO admin (title, post, date_post) VALUES(:title, :post, NOW())'); // Requête sans la partie variable
        $req->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
            'title' => $post->title(),
            'post' => $post->post(),
        ));
    }
    public function updatePost(Post $post) {
        $reqEdit = $this->db->prepare('UPDATE admin SET title = :title_edit, post = :post_edit WHERE id = :id');
        $reqEdit->execute(array(
    	'title_edit' => $post->title(),
    	'post_edit' => $post->post(),
        'id' => $post->id(),
        ));
    }
}