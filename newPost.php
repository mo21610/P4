<?php

    require 'model/Post.php';
    require 'model/PostManager.php';

    // Insertion des post dans BDD
    if (!empty($_POST)) { // Si $_POST n'est pas vide 
        $validation = true;       
        if (empty($_POST)) {
            $validation = false;
        }
        if ($validation == true) {
            $postInsert = new Post([
                'title' => $_POST['title'],
                'post' => $_POST['post'],
            ]);
            $postManagerInsert = new PostManager;
            $postManagerInsert->addPost($postInsert);
            header('Location:post_admin.php');
            exit();
        }
    }
    
?>


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

    <form class="offset-1 col-md-10" action="newPost.php" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" class="form-control" name="title">
        <label for="text">Texte :</label>
        <textarea name="post" id="text" class="form-control" cols="100" rows="10"></textarea><br>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>

</body>
</html>