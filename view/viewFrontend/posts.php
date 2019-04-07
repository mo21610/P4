<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <title>Page d'accueil du blog</title>
</head>

<body>
    
    <?php $title = "Billet simple pour l'Alaska" ?>
    <?php include("template_header.php"); ?>

    <?php foreach ($posts as $post) { ?> 
        <div class="jumbotron offset-1 col-md-10 text-white bg-dark" id="posts">
            <h2 class="font-italic" id="h2_list_post"><?= $post->title() ?></h2>
            <p><?= substr($post->post(), 0, 250); ?> ...</p>
            <p><i>Le <?= $post->datePost() ?></i></p>
            <a href="index.php?action=post&post=<?= $post->id(); ?>"><i>Lire la suite</i></a>
        </div>
    <?php } ?>  

</body>
</html>