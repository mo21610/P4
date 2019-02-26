<?php
    $id_comment = $_GET['comment'];
    try // Connexion à la BDD
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    
    $req = $bdd->prepare('DELETE FROM comments WHERE id = :id ');
    $req->execute(array( 
        'id' => $id_comment
    ));
    
    header('Location:comments.php');
    exit();
?>