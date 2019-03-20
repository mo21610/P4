<?php
    // Ouverture session
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location:view/loginView.php');
        exit();
    }

    require 'model/Post.php';
    require 'model/PostManager.php';

    // Récupération des post par ordre décroissant
    $postManager = new PostManager;
    $postsAll = $postManager->getAllPosts();

    require 'view/postAdminView.php';

