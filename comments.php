<?php
    try // Connexion à la BDD
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

    // Récupération des commentaires avec méthode GET
    $req = $bdd->query("SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%imin%ss') AS date_comment_fr, Signalement FROM comments WHERE Signalement = 1 ORDER BY date_comment");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="post_admin.php">Retour à la liste des billets</a>
   
    <!-- Affichage commentaires correspondant au post -->
    <?php while ($dataComment = $req->fetch()){ ?>
        <p><?= $dataComment['author'] ?> le <?= $dataComment['date_comment_fr']; ?></p>
        <p><?= $dataComment['comment'] ?></p>
        <a href="delete_comment.php?comment=<?= $dataComment['id']; ?>">Supprimer</a>
        <a href="signalement.php?comment=<?= $dataComment['id']; ?>&signalement=<?= $dataComment['Signalement'] ?>">Autoriser affichage commentaire</a>
    <?php } ?>
</body>
</html>