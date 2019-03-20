<?php
    // Creation de session
    session_start();

    require 'model/User.php';
    require 'model/UserManager.php';

    // $essaisUserInstenciation = new User([
    //     ,
    // ]);
    // var_dump($essaisUserInstenciation);
    
    // var_dump($essaisUsers);
    // foreach ($essaisUsers as $essaisUser) {
    //     var_dump($essaisUser->password()),
    // }
    // $essaisUserPassword = $essaisUsers->password();

    $essaisUserManager = new UserManager; 

    $essaisUserManager->getUser($_POST['username']);
    // var_dump($essaisUsers);
    // if(!empty($_POST)) { 
    //     $validation = true;
    //     if(empty($_POST['username']) || empty($_POST['password'])) {
    //         echo "Veuillez renseigner tous les champs";
    //         $validation = false;
    //     }  
        
        
        // $isPasswordCorrect = password_verify($_POST['password'], $essaisUsers->password());

    
        
        // if($isPasswordCorrect) {
    
        
    // }
    //         $_SESSION['user'] = $user->password();
    //         header('Location:post_admin.php');
    //         exit();
    //     }
    //     else {
    //         echo 'Id ou mot de passe incorrect';
    //     }

        // try // Connexion à la BDD
        // {
        //     $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        // }
        // catch(Exception $e)
        // {
        //         die('Erreur : '.$e->getMessage());
        // }
    
        // $countUsers = $bdd->prepare('SELECT * FROM users WHERE username = :username');
        // $countUsers->execute(array(
        //     'username' => $_POST['username']
        // ));
        // $dataUser = $countUsers->fetch();

        

        // Comparaison du pass envoyé via le formulaire avec la BDD
        
          
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="container text-center">
    <div class="form-login">
        <h3>Veuillez vous connecter</h3>
        <div class="row">
            <form class="offset-3 col-md-6 col-xs-12" action="login.php" method="post">       
                <input class="form-control" name="username" placeholder="username" type="text">        
                <input class="form-control" name="password" placeholder="password" type="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            </form>
        </div>
        <a href="registration.php">Créer un nouvel espace membre</a>
    </div>


    
        

</body>
</html>