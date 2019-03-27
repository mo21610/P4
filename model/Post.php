<?php
class Post {
    private $_id;
    private $_title;
    private $_post;
    private $_datePost;

    public function __construct(Array $dataPost) {
        $this->hydrate($dataPost);
    }
    
    // Hydratation
    public function hydrate(Array $dataPost) {
        if (isset($dataPost['id'])) {
            $this->setId($dataPost['id']);
        }
        if (isset($dataPost['title'])) {
            $this->setTitle($dataPost['title']);
        }
        if (isset($dataPost['post'])) {
            $this->setPost($dataPost['post']);
        }
        if (isset($dataPost['date_post'])) {
            $this->setDatePost($dataPost['date_post']);
        }
    }

    /*getters*/
    public function id() {
        return $this->_id;
    }
    public function title() {
        return $this->_title;
    }
    public function post() {
        return $this->_post;
    }
    public function datePost() {
        return $this->_datePost;
    }

    // setters
    public function setId($id) {
        $this->_id = $id;
    }
    public function setTitle($title) {
        $this->_title = $title;
    }
    public function setPost($post) {
        $this->_post = $post;
    }
    public function setDatePost($datePost) {
        $this->_datePost = $datePost;
    }
}