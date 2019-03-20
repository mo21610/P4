<?php

    require 'model/Post.php';
    require 'model/PostManager.php';

  // Récupération des post par ordre décroissant
  $postManager = new PostManager;
  $postsAll = $postManager->getAllPosts();
  

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <title>Page d'accueil du blog</title>
</head>

<body>

    <?php $title = "Billet simple pour l'Alaska"; ?>
    <?php require('template_header.php'); ?>

  
    <!-- Affichage de chaque posts (toutes les données sont protégées par htmlspecialchars) -->
    <?php foreach ($postsAll as $postAll) { ?> 
        <div class="jumbotron offset-1 col-md-10 text-white bg-dark">
            <h2 class="font-italic"><?= nl2br(htmlspecialchars($postAll->title())) ?></h2> <!-- nl2br convertit retour à la ligne en balises HTML -->
            <p><?= nl2br(htmlspecialchars($postAll->post())) ?></p>
            <p>Le <?= nl2br(htmlspecialchars($postAll->datePost())) ?></p>
            <a href="post.php?post=<?= $postAll->id(); ?>">Lire la suite</a> <!-- Lien vers la page des post entier -->
        </div>
    <?php } ?>  

</body>
</html>