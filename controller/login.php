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
        
        require 'view/loginView.php';
