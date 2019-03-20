<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer nouveau espace membre</title>
</head>
<body>
    
    <form action="controller/registration.php" method="post">
        Pseudo: <input type="text" name="username">
        Mot de passe: <input type="password" name="password">
        Confirmation du mot de passe: <input type="password" name="confirm_password">
        <button type="submit">Créer un nouvel espace membre</button>
    </form>


</body>
</html>