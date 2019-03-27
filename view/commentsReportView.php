<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page des commentaires</title>
</head>
<body>

    <?php include("template_header_admin.php"); ?>

    <?php foreach ($commentsReport as $commentReport){ ?>
        <p><?= $commentReport->author() ?> le <?= $commentReport->dateComment() ?></p>
        <p><?= $commentReport->comment() ?></p>
        <a class="btn btn-danger" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>">Supprimer</a>
        <a class="btn btn-info" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>&report=<?= $commentReport->report() ?>">Autoriser affichage commentaire</a>
    <?php } ?>

</body>
</html>