<?php

    require 'model/Comment.php';
    require 'model/CommentManager.php';
   
    $commentManagerDelete = new CommentManager;
    $commentDelete = $commentManagerDelete->deleteComment($_GET['comment']);
    
    header('Location:view/commentsView.php');
    exit();