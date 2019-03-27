<?php
class Comment {
    private $_id;
    private $_idPost;
    private $_author;
    private $_comment;
    private $_dateComment;
    private $_report;

    public function __construct(Array $data) {
        $this->hydrate($data);
    }
    
    // Hydratation
    public function hydrate(Array $data) {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['id_post'])) {
            $this->setIdPost($data['id_post']);
        }
        if (isset($data['author'])) {
            $this->setAuthor($data['author']);
        }
        if (isset($data['comment'])) {
            $this->setComment($data['comment']);
        }
        if (isset($data['date_comment'])) {
            $this->setDateComment($data['date_comment']);
        }
        if (isset($data['report'])) {
            $this->setReport($data['report']);
        }
    }

    
    // Getters
    public function id() {
        return $this->_id;
    }
    public function idPost() {
        return $this->_idPost;
    }
    public function author() {
        return $this->_author;
    }
    public function comment() {
        return $this->_comment;
    }
    public function dateComment() {
        return $this->_dateComment;
    }
    public function report() {
        return $this->_report;
    }

    
    // Setters
    public function setId($id) {
        $this->_id = $id;
    }
    public function setIdPost($idPost) {
        $this->_idPost = $idPost;
    }
    public function setAuthor($author) {
        $this->_author = $author;
    }
    public function setComment($comment) {
        $this->_comment = $comment;
    }
    public function setDateComment($dateComment) {
        $this->_dateComment = $dateComment;
    }
    public function setReport($report) {
        $this->_report = $report;
    }
}