<?php
    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    if (!empty($_POST)) { // Si $_POST n'est pas vide 
        $validation = true;
        
        if (empty($_POST)) {
            $validation = false;
        }

        if ($validation == true) {
            // Insertion des post dans BDD
            $req = $bdd->prepare('INSERT INTO admin (title, post, date_post) VALUES(:title, :post, NOW())'); // Requête sans la partie variable
            $req->execute(array(  // Recuperation des variables de $_POST (issue du form) & insertion dans BDD
                'title' => $_POST['title'],
                'post' => $_POST['post'],
            ));
        }
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
    <link rel="stylesheet" href="style_admin.css">
    <title>Page d'édition des billets du blog</title>
</head>

<body>

    <?php include("header_admin.php"); ?> 

    <h2>Edition du texte:</h2>

    <form action="editAdmin.php" method="post">
        Titre: <br><input type="text" class="form_edit" name="title"><br>
        Texte: <br><textarea name="post" class="form_edit" cols="100" rows="10"></textarea><br>
        <button type="submit">Publier</button>
    </form>

    <h2>Billets édités:</h2>

    <!-- Affichage de chaque posts (toutes les données sont protégées par htmlspecialchars) -->
    <?php while ($data = $response->fetch()){ ?> 
    <div id="post">
        <h3><?= htmlspecialchars($data['title']) ?></h3> <!-- nl2br convertit retour à la ligne en balises HTML -->
        <p><?= nl2br(htmlspecialchars($data['post'])) ?></p>
        <p>Le <?= htmlspecialchars($data['date_post_fr']) ?></p>
    </div>
    <?php } ?>

</body>
</html>