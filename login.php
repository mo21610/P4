<?php
    session_start();
    
    try // Try et Catch pour tester les erreurs
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''); // Connexion à la BDD
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage()); // Affichage d'un msg si erreur
    }

    if(empty($_POST['username']) || empty($_POST['password'])) {
        echo "Veuillez remplir tous les champs";
    }
    else {
        // Récupération de l'utilisateur et de son pass haché
        $req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $_POST['username']
        ));
        $dataUser = $req->fetch();
        // Comparaison du pass envoyé via le formulaire avec la BDD
        $isPasswordCorrect = password_verify($_POST['password'], $dataUser['password']);
        
        if($isPasswordCorrect) {
            $_SESSION['user'] = $dataUser['username'];
            header('Location:post_admin.php');
            exit();
        }
        else {
            echo 'Id ou mot de passe incorrect';
        }
    }
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
    <form action="login.php" method="post">
        <input name="username" placeholder="username" type="text">
        <input name="password" placeholder="password" type="password">
        <button type="submit">Login</button>
    </form>
    <a href="registration.php">Créer un nouvel espace membre</a>
</body>
</html>