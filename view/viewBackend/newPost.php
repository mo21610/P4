<?php $title = "Page d'édition des billets" ?>
<?php ob_start(); ?>
    <form class="offset-1 col-md-10" action="index.php?action=newPost" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" class="form-control" name="title">
        <label for="text">Texte :</label>
        <textarea id="mytextarea" name="post" cols="100" rows="8"></textarea>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template_admin.php'); ?>