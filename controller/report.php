<?php

    require 'model/Comment.php';
    require 'model/CommentManager.php';
    
    $valeur_report= $_GET['report'];
    
    if($valeur_report == '0'){
        $commentUpdate = new Comment([
            'id' => $_GET['comment'],
        ]);
        $commentManagerUpdate = new CommentManager;
        $commentManagerUpdate = $commentManagerUpdate->updateComment($commentUpdate);

        header('Location:view/postView.php?post='.$_GET['post']);
        exit();
    }
    else if ($valeur_report == '1') {
        $commentUpdateReport = new Comment([
            'id' => $_GET['comment'],
        ]);
        $commentManagerUpdateReport = new CommentManager;
        $commentManagerUpdateReport = $commentManagerUpdateReport->updateCommentReport($commentUpdateReport);
         
        header("Location:view/commentsView.php");
        exit();
    }
    