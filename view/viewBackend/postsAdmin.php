<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page d'administration des billets</title>
</head>
<body>

    <?php include("template_header_admin.php"); ?>

    <div class="container-fluid">

        <?php foreach ($posts as $post){ ?> 
            <table class="table table-striped">
                <tr class=row>
                    <td class="col-md-2"><h3><?= $post->title() ?></h3></td>
                    <td class="col-md-8"><?= $post->post() ?></td>
                    <td class=col-md-1><a class="btn btn-info" href="index.php?action=updatePost&post=<?= $post->id(); ?>" role="button">Modifier</a></td>
                    <td class=col-md-1><a class="btn btn-danger" href="index.php?action=postsAdmin&post=<?= $post->id(); ?>" role="button">Supprimer</a></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</body>
</html>