<?php

    require 'model/Post.php';
    require 'model/PostManager.php';

    // Insertion des post dans BDD
    if (!empty($_POST)) { // Si $_POST n'est pas vide 
        $validation = true;       
        if (empty($_POST)) {
            $validation = false;
        }
        if ($validation == true) {
            $postInsert = new Post([
                'title' => $_POST['title'],
                'post' => $_POST['post'],
            ]);
            $postManagerInsert = new PostManager;
            $postManagerInsert->addPost($postInsert);
            header('Location:view/postAdminView.php');
            exit();
        }
    }
    
    require 'view/newPostView.php';

