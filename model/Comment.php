<?php
class Comment {
        private $id;
        private $idPost;
        private $author;
        private $comment;
        private $dateComment;
        private $report;

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
        return $this->id;
    }
    public function idPost() {
        return $this->idPost;
    }
    public function author() {
        return $this->author;
    }
    public function comment() {
        return $this->comment;
    }
    public function dateComment() {
        return $this->dateComment;
    }
    public function report() {
        return $this->report;
    }

    
    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setIdPost($idPost) {
        $this->idPost = $idPost;
    }
    public function setAuthor($author) {
        $this->author = $author;
    }
    public function setComment($comment) {
        $this->comment = $comment;
    }
    public function setDateComment($dateComment) {
        $this->dateComment = $dateComment;
    }
    public function setReport($report) {
        $this->report = $report;
    }
}