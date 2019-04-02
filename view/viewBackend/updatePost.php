<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=9u2qxxf7nxkp9jfgfp3esqbfnm2hfvwxk26x40piohsyjkmm'></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
    </script>
    <title>Page de mofication des billets</title>
</head>

<body>
    <?php include("template_header_admin.php"); ?> 

    <form class="offset-1 col-md-10" action="index.php?action=updatePost&post=<?= $post->id(); ?>" method="post">
        Titre: <br><input type="text" class="form-control" value="<?= $post->title(); ?>" name="title_edit"><br>
        Texte: <br><textarea id="mytextarea" name="post_edit"><?= $post->post(); ?></textarea>
        <!-- Texte: <br><textarea name="post_edit" class="form-control" cols="100" rows="10"></textarea><br> -->
        <input type="hidden" name="id_post_edit" value="<?php $post->id(); ?>"/>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
</body>

</html>
    