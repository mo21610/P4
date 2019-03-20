<?php

    require 'model/Post.php';
    require 'model/PostManager.php';

    // Modification du post
    if(isset($_POST['title_edit']) && isset($_POST['post_edit'])) {
        $postUpdate = new Post([
            'id' => $_GET['post'],
            'title' => $_POST['title_edit'],
            'post' => $_POST['post_edit'],
        ]);
        $postManagerUpdate = new PostManager;
        $postManagerUpdate = $postManagerUpdate->updatePost($postUpdate);

        header('Location:view/postAdminView.php');
        exit();      
    }