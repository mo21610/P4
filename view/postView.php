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

    <a class="btn btn-secondary" href="../controller/index.php?action=readAllPost">Retour à la liste des billets</a>
   
    <!-- Affichage post -->
    <p><?= $postOne->post() ?></p>
    <p>Le <?= $postOne->datePost()  ?></p>
    
    <h2>Commentaires</h2>
    <!-- Affichage commentaires -->
    <?php foreach ($comments as $comment) { ?>
        <p><?= $comment->author() ?> le <?= $comment->dateComment() ?></p>
        <p><?= $comment->comment()  ?></p>
        <a class="btn btn-danger" href="../controller/index.php?action=post&post=<?= $id_post ?>&comment=<?= $comment->id(); ?>&report=<?= $comment->report(); ?>">Signaler</a>
    <?php } ?>


    
    <h2>Ajouter un commentaire</h2>

    <form class="col-md-5 col-xs-12" action="../controller/index.php?action=post&post=<?= $id_post ?>" method="post">
        Pseudo: <br><input class="form-control" type="text" name="author" class="form_comment"><br>
        Commentaire: <br><textarea class="form-control" name="comment" class="form_comment"></textarea><br>
        <button class="btn btn-secondary" type="submit">Ajouter un commentaire</button>
    </form>

</body>
</html>