<?php   
    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Récupération des commentaires
    $response = $bdd->query('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments ORDER BY id DESC');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_admin.css">
    <title>Page de gestion des commentaires du blog</title>
</head>

<body>

    <?php include("header_admin.php"); ?>

    <h2>Commentaires</h2>

        <?php while ($data = $response->fetch()){ ?>
            <div id="comment_admin">
                <p><?= htmlspecialchars($data['author']); ?> le <?= $data['date_comment_fr']; ?></p>
                <p><?= nl2br(htmlspecialchars($data['comment'])); ?></p>
            </div>
        <?php } ?>


</body>
</html>