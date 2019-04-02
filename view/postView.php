<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page des billets du blog</title>
</head>

<body>
    <?php $title = $post->title(); ?>

    <?php include("template_header.php"); ?>

    <div class="container-fluid">
        
        <div class="text-right">
            <a class="btn btn-secondary" id="return_button" href="index.php?action=posts">Retour à la liste des billets</a>
        </div>

        <p><?= $post->post() ?></p>
        <p class="date_post">Le <?= $post->datePost()  ?></p>


        <h2>Commentaires</h2>

        <?php foreach ($comments as $comment) { ?>
            <table class="table">
                <tr>
                    <td class="col-md-2"><p><b><?= $comment->author() ?></b> <br/> Le <?= $comment->dateComment() ?></p></td>
                    <td class="col-md-8"><p><?= $comment->comment()  ?></p></td>
                    <td class="col-md-2"><a class="btn btn-danger" href="index.php?action=post&post=<?= $id_post ?>&comment=<?= $comment->id(); ?>&report=<?= $comment->report(); ?>">Signaler</a></td>                  
                </tr>
            </table>
        <?php } ?>
 
        <h2>Ajouter un commentaire</h2>

        <form class="col-md-5 col-xs-12" action="index.php?action=post&post=<?= $id_post ?>" method="post">
            Pseudo: <br><input class="form-control" type="text" name="author" class="form_comment"><br>
            Commentaire: <br><textarea class="form-control" name="comment" class="form_comment"></textarea><br>
            <button class="btn btn-secondary" type="submit">Ajouter un commentaire</button>
        </form>

    </div>

</body>
</html>