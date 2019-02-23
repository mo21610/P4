<?php
    try // Connexion à la BDD
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    
    $req = $bdd->prepare('DELETE FROM admin WHERE id = :id ');
    $req->execute(array( 
        'id' => $_GET['post'],
    ));
    
    header('Location:post_admin.php');
    exit();
?>