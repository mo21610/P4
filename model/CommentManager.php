<?php

class CommentManager extends Manager { 
    public function addComment(Comment $comment){
        $reqInsertComment = $this->db->prepare('INSERT INTO comments (id_post, author, comment, date_comment, report) VALUES(:id_post, :author, :comment, NOW(), 0)'); // Requête sans la partie variable
        $reqInsertComment->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
            'id_post' => $comment->idPost(),
            'author' => $comment->author(),
            'comment' => $comment->comment(),
        ));
    }
    public function getComment($id) {
        $comments = [];
        $req = $this->db->prepare("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%i') AS date_comment, report FROM comments WHERE id_post = :id_post AND report = 0 ORDER BY date_comment");
        $req->execute(array(
        'id_post' => $id,
        ));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
    public function getCommentReport() {
        $commentsReport = [];
        $req = $this->db->prepare("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%imin%ss') AS date_comment, report FROM comments WHERE report = :report ORDER BY date_comment");
        $req->execute(array(
            'report' => 1,
            ));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $commentsReport[] = new Comment($data);
        }
        return $commentsReport;
    }
    public function deleteComment($id) {
        $req = $this->db->prepare('DELETE FROM comments WHERE id = :id ');
        $req->execute(array( 
        'id' => $id,
        ));
    }
    
    public function updateComment(Comment $comment) {
        $req = $this->db->prepare('UPDATE comments SET report = 1 WHERE id = :id ');
        $req->execute(array( 
            'id' => $comment->id(),
        ));
    }
    
    public function updateCommentReport(Comment $comment) {
        $req = $this->db->prepare('UPDATE comments SET report = 0 WHERE id = :id ');
        $req->execute(array( 
            'id' => $comment->id(),
        ));
    }
}