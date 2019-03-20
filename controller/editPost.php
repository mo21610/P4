<?php  
    
    require 'model/Post.php';
    require 'model/PostManager.php';

    // Récupération du post avec méthode get
    $postManagerOne = new PostManager;
    $postOne = $postManagerOne->getOnePost($_GET['post']);
    
    require 'view/editPostView.php';
