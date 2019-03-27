<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body class="container text-center">
    <div class="form-login">
        <h3>Veuillez vous connecter</h3>
        <div class="row">
            <form class="offset-3 col-md-6 col-xs-12" action="index.php?action=login" method="post">       
                <input class="form-control" name="username" placeholder="username" type="text">        
                <input class="form-control" name="password" placeholder="password" type="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            </form>
        </div>
        <a href="index.php?action=userInsert">Créer un nouvel espace membre</a>
    </div>

</body>
</html>