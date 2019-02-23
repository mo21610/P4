<?php  
    try // Connexion à la BDD
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Récupération du post avec méthode get
    $req = $bdd->prepare('SELECT id, title, post FROM admin WHERE id = :id');
    $req->execute(array(
        'id' => $_GET['post'],
    ));
    $data = $req->fetch();

    if(isset($_POST['title_modif']) && isset($_POST['post_modif'])) {
        $reqModif = $bdd->prepare('UPDATE admin SET title = :title_modif, post = :post_modif WHERE id = :id');
        $reqModif->execute(array(
        	'title_modif' => $_POST['title_modif'],
        	'post_modif' => $_POST['post_modif'],
            'id' => $_GET['post'],
            ));
            header('Location:post_admin.php');
            exit();      
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de mofication des billets</title>
</head>

<body>
    <?php include("header_admin.php"); ?> 

    <h2>Modification du billet</h2>

    <form action="modif_form.php?post=<?= $_GET['post']; ?>" method="post">
        Titre: <br><input type="text" class="form_edit" value="<?= $data['title']; ?>" name="title_modif"><br>
        Texte: <br><textarea name="post_modif" class="form_edit" cols="100" rows="10"><?= $data['post']; ?></textarea><br>
        <input type="hidden" name="id_post_modif" value="<?php $data['id']; ?>"/>
        <button type="submit">Publier</button>
    </form>
</body>

</html>


    