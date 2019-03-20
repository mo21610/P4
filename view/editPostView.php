<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page de mofication des billets</title>
</head>

<body>
    <?php include("template_header_admin.php"); ?> 

    <form class="offset-1 col-md-10" action="controller/edit_post_execute.php?post=<?= $postOne->id(); ?>" method="post">
        Titre: <br><input type="text" class="form-control" value="<?= $postOne->title(); ?>" name="title_edit"><br>
        Texte: <br><textarea name="post_edit" class="form-control" cols="100" rows="10"><?= $postOne->post(); ?></textarea><br>
        <input type="hidden" name="id_post_edit" value="<?php $postOne->id(); ?>"/>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
</body>

</html>
    