<?php
    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    // Récupération des post par ordre décroissant
    $req = $bdd->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM admin WHERE id = ?');
    $req->execute(array($_GET['post']));
    $data = $req->fetch();

    $req->closeCursor(); // on libère le curseur pour la prochaine requête

    // Récupération des commentaires
    $req = $bdd->prepare('SELECT author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment');
    $req->execute(array($_GET['post']));
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
    <!-- Introduction dans page post du billet sélectionné sur la page d'accueil -->
    <p><?= nl2br(htmlspecialchars($data['post'])); ?></p> 
    <p><?= nl2br(htmlspecialchars($data['date_post_fr'])); ?></p>

    <h2>Commentaires</h2>

    <?php while ($data = $req->fetch()){ ?>
    <p><?= htmlspecialchars($data['author']); ?> le <?= $data['date_comment_fr']; ?></p>
    <p><?= nl2br(htmlspecialchars($data['comment'])); ?></p>
    <?php } ?>
</body>
</html>