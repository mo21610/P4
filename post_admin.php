<?php
    // Ouverture session
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location:login.php');
        exit();
    }

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <?php include("template_header_admin.php"); ?>

    <div class="container-fluid">
        <!-- Lien vers page dédition des billets -->

        <br>

        <a class="btn btn-secondary btn-lg" href="newPost.php" role="button">Editer</a>

        <br>
        <br>

        <!-- Affichage de chaque posts (toutes les données sont protégées par htmlspecialchars) -->
        <?php foreach ($postsAll as $postAll){ ?> 
            <table class="table table-striped">
                <tr class=row>
                    <td class="col-md-2"><h3><?= htmlspecialchars($postAll->title()) ?></h3></td> <!-- nl2br convertit retour à la ligne en balises HTML -->
                    <td class="col-md-6"><?= nl2br(htmlspecialchars($postAll->post())) ?></td>
                    <td class=col-md-2><a class="btn btn-info" href="edit_post.php?post=<?= $postAll->id(); ?>" role="button">Modifier</a></td>
                    <td class=col-md-2><a class="btn btn-info" href="delete_post.php?post=<?= $postAll->id(); ?>" role="button">Supprimer</a></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</body>
</html>