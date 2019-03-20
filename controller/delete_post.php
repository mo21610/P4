<?php 
    require 'model/Post.php';
    require 'model/PostManager.php';
   
    $postManagerDelete = new PostManager;
    $postDelete = $postManagerDelete->deletePost($_GET['post']);
    
    header('Location:view/postAdminView.php');
    exit();
