<?php
    $validation = true;
    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // // Recuperation données table users
    // if(!empty($_POST['username']) || !empty($_POST['password'])) {
    //     $countUsers = $bdd->query("SELECT COUNT(username) FROM users WHERE username = $_POST['username']");
    //     // $countUsers->execute(array(
    //     // 'username' => $_POST['username']
    //     // ));
    //     var_dump($_POST['username']);
    //     var_dump($countUsers);
    //     if ($countUsers > 0){
    //         echo "Pseudo déjà utilisé, veuillez en choisir un autre";
    //         $validation = false;
    //     }
    // }
    

    
    // Insertion dans BDD
    if(empty($_POST['username']) || empty($_POST['password'])) {
        echo "Variable vide";
        $validation = false;
    }
    else if($_POST['password'] != $_POST['confirm_password']) {
        echo "Veuillez inscrire le même mot de passe dans mot de passe et confirmation mot de passe";
        $validation = false;
    } 
    else if ($validation == true){
         // Hachage du mot de passe
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $req = $bdd->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
        $req->execute(array(
            'username' => $_POST['username'],
            'password' => $pass_hash
        ));
        header("Location:login.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer nouveau espace membre</title>
</head>
<body>
    
    <form action="registration.php" method="post">
        Pseudo: <input type="text" name="username">
        Mot de passe: <input type="password" name="password">
        Confirmation du mot de passe: <input type="password" name="confirm_password">
        <button type="submit">Créer un nouvel espace membre</button>
    </form>


</body>
</html>