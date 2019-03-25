<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Créer nouveau espace membre</title>
</head>

<body class="container text-center">
    <div class="form-login">
        <h3>Création d'un nouvel espace utilisateur</h3>
        <div class="row">
            <form class="offset-3 col-md-6 col-xs-12" action="../controller/index.php?action=userInsert" method="post">       
                <input class="form-control" name="username" placeholder="Pseudo" type="text">        
                <input class="form-control" name="password" placeholder="Mot de passe" type="password">
                <input class="form-control" name="confirm_password" placeholder="Confirmation du mot de passe" type="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Créer un nouvel espace membre</button>
            </form>
        </div>
    </div>

</body>
</html>