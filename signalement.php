<?php
    $valeur_signalement = $_GET['signalement'];

    try // Connexion à la BDD
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    
    if($valeur_signalement == 0){
        $id_post = $_GET['post'];
        $req = $bdd->prepare('UPDATE comments SET Signalement = 1 WHERE id = :id ');
        $req->execute(array( 
            'id' => $_GET['comment'],
        ));
        header("Location:post.php?post=$id_post");
        exit();
    }
    else if ($valeur_signalement == 1) {
        $req = $bdd->prepare('UPDATE comments SET Signalement = 0 WHERE id = :id ');
        $req->execute(array( 
            'id' => $_GET['comment'],
        ));
        header("Location:comments.php");
        exit();
    }
    
    
?>