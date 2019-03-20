<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page des commentaires</title>
</head>
<body>

    <?php include("view/template_header_admin.php"); ?>

    <a class="btn btn-secondary" href="view/postAdminView.php">Retour à la liste des billets</a>
   
    <!-- Affichage commentaires correspondant au post -->
    <?php foreach ($commentsReport as $commentReport){ ?>
        <p><?= $commentReport->author() ?> le <?= $commentReport->dateComment() ?></p>
        <p><?= $commentReport->comment() ?></p>
        <a class="btn btn-danger" href="controller/delete_comment.php?comment=<?= $commentReport->id(); ?>">Supprimer</a>
        <a class="btn btn-info" href="report.php?comment=<?= $commentReport->id(); ?>&report=<?= $commentReport->report() ?>">Autoriser affichage commentaire</a>
    <?php } ?>
</body>
</html>