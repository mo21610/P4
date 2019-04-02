<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page des commentaires</title>
</head>
<body>

    <?php include("template_header_admin.php"); ?>

    <?php foreach ($commentsReport as $commentReport){ ?>
    <table class="table table-striped">
                <tr class=row>
                    <td class="col-md-2 text-center"><p><b><?= $commentReport->author() ?></b></p></td>
                    <td class="col-md-8"><p><?= $commentReport->comment() ?></p></td>
                    <td class=col-md-1><a class="btn btn-info" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>&report=<?= $commentReport->report() ?>" role="button">Autoriser</a></td>
                    <td class=col-md-1><a class="btn btn-danger" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>" role="button">Supprimer</a></td>
                </tr>
    </table>
    <?php } ?>

</body>
</html>