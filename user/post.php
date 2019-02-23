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
    $req = $bdd->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM admin WHERE id = ?');
    $req->execute(array($_GET['post']));
    $data = $req->fetch();

    $req->closeCursor(); // on libère le curseur pour la prochaine requête

    // Récupération des commentaires avec méthode GET
    $req = $bdd->prepare('SELECT author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment');
    $req->execute(array($_GET['post']));

    $req->closeCursor(); // on libère le curseur pour la prochaine requête

    if (!empty($_POST['author']) && ($_POST['comment'])) { // Si $_POST n'est pas vide 
        $validation = true;
        
        if (empty($_POST['author']) || ($POST['comment'])) {
            $validation = false;
            $errorForm = "Veuillez remplir tous les champs";
        }
        if ($validation == true) {
            // Insertion des commentaires à l'aide d'une requête préparée
            $req = $bdd->prepare('INSERT INTO comments (id_post, author, comment, date_comment) VALUES(:id_post, :author, :comment, NOW())'); // Requête sans la partie variable
            $req->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans ligne dans tab
                'author' => $_POST['author'], 
                'comment' => $_POST['comment'],
                'id_post' => $id_post,
            ));
        }
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

    <?php while ($data = $req->fetch()){ ?>
    <p><?= htmlspecialchars($data['author']); ?> le <?= $data['date_comment_fr']; ?></p>
    <p><?= nl2br(htmlspecialchars($data['comment'])); ?></p>
    <?php } ?>

    <h2>Ajouter un commentaire</h2>

    <form action="post.php?post=<?= $id_post; ?>" method="post">
        Pseudo: <br><input type="text" class="form_comment" name="author"><br>
        Commentaire: <br><textarea name="comment" class="form_comment" cols="100" rows="10"></textarea><br>
        <button type="submit">Ajouter un commentaire</button>
    </form>

    <?php if(isset($errorArticle)){echo $errorForm;}?>

</body>
</html>