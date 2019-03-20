<?php

    require 'model/Comment.php';
    require 'model/CommentManager.php';

    $commentManagerReport = new CommentManager;
    $commentsReport = $commentManagerReport->getCommentReport();

    require 'view/commentsView.php';