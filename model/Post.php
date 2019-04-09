<?php
require 'HydrateManager.php';

class Posts extends HydrateManager{
    private $id;
    private $title;
    private $post;
    private $datePost;
    
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
        return $this->id;
    }
    public function title() {
        return $this->title;
    }
    public function post() {
        return $this->post;
    }
    public function datePost() {
        return $this->datePost;
    }

    // setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setPost($post) {
        $this->post = $post;
    }
    public function setDatePost($datePost) {
        $this->datePost = $datePost;
    }
}