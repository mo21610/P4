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

            header("Location:post.php?post=$id_post");
            exit();
        }
    }
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page des billets du blog</title>
</head>

<body>

    <?php ob_start(); ?>
        <p><?= $postOne->title()  ?></p>
    <?php $title = ob_get_clean(); ?>

    <?php require('template_header.php'); ?>


    <a class="btn btn-secondary" href="index.php">Retour à la liste des billets</a>
    
    <!-- Affichage post -->
    <p><?= $postOne->post() ?></p>
    <p>Le <?= $postOne->datePost()  ?></p>
    
    <h2>Commentaires</h2>
    <!-- Affichage commentaires -->
    <?php foreach ($comments as $comment) { ?>
        <p><?= $comment->author() ?> le <?= $comment->dateComment() ?></p>
        <p><?= $comment->comment()  ?></p>
        <a class="btn btn-danger" href="report.php?comment=<?= $comment->id(); ?>&post=<?= $comment->idPost(); ?>&report=<?= $comment->report(); ?>">Signaler</a>
    <?php } ?>


    
    <h2>Ajouter un commentaire</h2>

    <form class="col-md-5 col-xs-12" action="post.php?post=<?= $id_post ?>" method="post">
        Pseudo: <br><input class="form-control" type="text" name="author" class="form_comment"><br>
        Commentaire: <br><textarea class="form-control" name="comment" class="form_comment"></textarea><br>
        <button class="btn btn-secondary" type="submit">Ajouter un commentaire</button>
    </form>

</body>
</html>