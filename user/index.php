<?php
    $form = true;
    try // Try et Catch pour tester les erreurs
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''); // Connexion à la BDD
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage()); // Affichage d'un msg si erreur
    }
    // Récupération des post par ordre décroissant
    $response = $bdd->query('SELECT title, post, date_post FROM admin ORDER BY id DESC');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Page d'accueil du blog</title>
</head>

<body>

    <?php include("header.php"); ?> 
  
    <!-- Affichage de chaque posts (toutes les données sont protégées par htmlspecialchars) -->
    <?php while ($data = $response->fetch()){ ?> 
    <div id=billets>
        <h2><?= htmlspecialchars($data['title']) ?></h2> 
        <p><?= htmlspecialchars($data['post']) ?></p>
        <p>Le <?= htmlspecialchars($data['date_post']) ?></p>
        <a href="#">Lire la suite</a>
    </div>
    <?php }
    $response->closeCursor(); // Ferme les résultats de recherche
    ?>

</body>
</html>