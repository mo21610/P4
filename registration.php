<?php

    require 'model/User.php';
    require 'model/UserManager.php';

    // Insertion dans BDD
    if(!empty($_POST)) { 
        $validation = true;
    
        // $countUsers = $bdd->prepare('SELECT * FROM users WHERE username = :username');
        // $countUsers->execute(array(
        //     'username' => $_POST['username']
        // ));
        // $data = $countUsers->fetch();
        // var_dump($data);
        // $userManager = new UserManager;
        // $user = $userManager->userInsert($_POST['username']);

        if(empty($_POST['username']) || empty($_POST['password'])) {
            echo "Veuillez renseigner tous les champs";
            $validation = false;
        }
        // if ($username){
        //     echo "Pseudo déjà utilisé, veuillez en choisir un autre";
        //     $validation = false;
        // }
        if($_POST['password'] != $_POST['confirm_password']) {
            echo "Veuillez inscrire le même mot de passe dans mot de passe et confirmation mot de passe";
            $validation = false;
        } 
        if ($validation == true){
             // Hachage du mot de passe
            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $userInsert = new User([
                'username' => $_POST['username'],
                'password' => $pass_hash,
            ]);
            $userManagerInsert = new UserManager;
            $userManagerInsert->userInsert($userInsert);
            
            header("Location:login.php");
            exit();
        }
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