<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=9u2qxxf7nxkp9jfgfp3esqbfnm2hfvwxk26x40piohsyjkmm'></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
    </script>
    <title>Page d'édition des billets du blog</title>
</head>

<body>

    <?php include("template_header_admin.php"); ?>

    <form class="offset-1 col-md-10" action="index.php?action=newPost" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" class="form-control" name="title">
        <label for="text">Texte :</label>
        <textarea id="mytextarea" name="post"></textarea>
        <!-- <textarea name="post" id="text" class="form-control" cols="100" rows="10"></textarea><br> -->
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>

</body>
</html>