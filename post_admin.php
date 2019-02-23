<?php
    // Ouverture session
    session_start();
        if(!isset($_SESSION['user'])) {
            header('Location:login.php');
            exit();
        }

    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Récupération des post par ordre décroissant
    $response = $bdd->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM admin ORDER BY id DESC');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php include("header_admin.php"); ?> 

    <!-- Lien vers page dédition des billets -->
    <a href="editAdmin.php">Editer</a>

    <h2>Billets édités:</h2>

    <!-- Affichage de chaque posts (toutes les données sont protégées par htmlspecialchars) -->
    <?php while ($data = $response->fetch()){ ?> 
    <div id="post">
        <h3><?= htmlspecialchars($data['title']) ?></h3> <!-- nl2br convertit retour à la ligne en balises HTML -->
        <p><?= nl2br(htmlspecialchars($data['post'])) ?></p>
        <p>Le <?= htmlspecialchars($data['date_post_fr']) ?></p>
        <a href="modif_form.php?post=<?= $data['id']; ?>">Modifier</a>
        <a href="delete_post.php?post=<?= $data['id']; ?>">Supprimer</a>
    </div>
    <?php } ?>

</body>
</html>