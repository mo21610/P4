<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="public/css/style_admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Template header</title>
</head>
<body>
  <header>
        <div class="bg-dark text-white" id="menu">   
            <nav class="navbar navbar-expand-md navbar-light bg-light"> 
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?action=newPost">Editer un billet<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?action=commentsReport">Gestion des commentaires</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?action=postsAdmin">Liste des billets</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php?action=signOut">Se déconnecter</a>
                    </li>
                  </ul>
            </nav>
            <h1 class="text-center">ESPACE ADMINISTRATEUR</h1>
        </div>
  </header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="public/js/main.js"></script>
  
</body>
</html>
