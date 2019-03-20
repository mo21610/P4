<?php

    require 'model/Comment.php';
    require 'model/CommentManager.php';
    require 'model/Post.php';
    require 'model/PostManager.php';

    $id_post = $_GET['post'];

    // Récupération du post avec méthode get
    $postManagerOne = new PostManager;
    $postOne = $postManagerOne->getOnePost($_GET['post']);

    // Recuperation des commentaires
    $commentManager = new CommentManager;
    $comments = $commentManager->getComment($_GET['post']);

    // Insertion des commentaires
    if(!empty($_POST['author']) || !empty($_POST['comment'])) {
        $validation = true;
        if (empty($_POST['author']) || empty($_POST['comment'])) {
            $validation = false;
        }
        if ($validation == true) {
            $commentInsert = new Comment([
                'id_post' => $_GET['post'],
                'author' => $_POST['author'],
                'comment' => $_POST['comment'],
            ]);        
            $commentManagerInsert = new CommentManager;
            $commentManagerInsert->addComment($commentInsert);

            header("Location:view/postView.php?post=$id_post");
            exit();
        }
    }

    require 'view/postView.php';

