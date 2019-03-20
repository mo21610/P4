<?php 
    require 'model/Post.php';
    require 'model/PostManager.php';
   
    $postManagerDelete = new PostManager;
    $postDelete = $postManagerDelete->deletePost($_GET['post']);
    
    header('Location:post_admin.php');
    exit();
