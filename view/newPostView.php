<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Page d'édition des billets du blog</title>
</head>

<body>

    <?php include("template_header_admin.php"); ?>

    <form class="offset-1 col-md-10" action="../controller/index.php?action=newPost" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" class="form-control" name="title">
        <label for="text">Texte :</label>
        <textarea name="post" id="text" class="form-control" cols="100" rows="10"></textarea><br>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>

</body>
</html>