<?php

    require 'model/Post.php';
    require 'model/PostManager.php';

    // Récupération des post par ordre décroissant
    $postManager = new PostManager;
    $postsAll = $postManager->getAllPosts();

    require 'view/indexView.php';


