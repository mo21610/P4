<?php
    
    $id_post = $_GET['post'];
    var_dump($id_post);

    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    // Récupération du post avec méthode get
    $req = $bdd->prepare("SELECT id, title, post, DATE_FORMAT(date_post, '%d/%m/%Y à %Hh%imin%ss') AS date_post_fr FROM admin WHERE id = :id");
    $req->execute(array(
        'id' => $_GET['post'],
    ));
    $data = $req->fetch();


    // Récupération des commentaires avec méthode GET
    $req = $bdd->prepare("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%imin%ss') AS date_comment_fr, Signalement FROM comments WHERE id_post = :id_post AND Signalement = 0 ORDER BY date_comment");
    $req->execute(array(
        'id_post' => $_GET['post'],
    ));

    
    // Insertion commentaire dans BDD
    if(empty($_POST['author']) || empty($_POST['comment'])) {
        echo "Variable vide";
    }
    else {
        $reqInsertComment = $bdd->prepare('INSERT INTO comments (id_post, author, comment, date_comment, Signalement) VALUES(:id_post, :author, :comment, NOW(), 0)'); // Requête sans la partie variable
        $reqInsertComment->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
            'id_post' => $_GET['post'],
            'author' => $_POST['author'],
            'comment' => $_POST['comment'],
        ));
        header("Location:post.php?post=$id_post");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Page des billets du blog</title>
</head>

<body>

    <?php include("header.php"); ?>

    <a href="index.php">Retour à la liste des billets</a>
    
    <!-- Affichage post -->
    <p><?= nl2br(htmlspecialchars($data['post'])); ?></p> 
    <p><?= nl2br(htmlspecialchars($data['date_post_fr'])); ?></p>

    <h2>Commentaires</h2>

    <!-- Affichage commentaires correspondant au post -->
    <?php while ($dataComment = $req->fetch()){ ?>
    <p><?= $dataComment['author'] ?> le <?= $dataComment['date_comment_fr']; ?></p>
    <p><?= $dataComment['comment'] ?></p>
    <a href="signalement.php?comment=<?= $dataComment['id']; ?>&post=<?= $id_post ?>&signalement=<?= $dataComment['Signalement'] ?>">Signaler</a>

    <?php } ?>

    
    <h2>Ajouter un commentaire</h2>

    <form action="post.php?post=<?= $id_post ?>" method="post">
        Pseudo: <br><input type="text" name="author" class="form_comment"><br>
        Commentaire: <br><textarea name="comment" class="form_comment" cols="100" rows="10"></textarea><br>
        <button type="submit">Ajouter un commentaire</button>
    </form>

</body>
</html>