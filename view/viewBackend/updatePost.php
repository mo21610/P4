<?php $title = 'Page de mofication des billets' ?>
<?php ob_start(); ?>
    <form class="offset-1 col-md-10" action="index.php?action=updatePost&post=<?= $post->id(); ?>" method="post">
        Titre: <br><input type="text" class="form-control" value="<?= $post->title(); ?>" name="title_edit"><br>
        Texte: <br><textarea id="mytextarea" name="post_edit"><?= $post->post(); ?></textarea>
        <input type="hidden" name="id_post_edit" value="<?php $post->id(); ?>"/>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template_admin.php'); ?>
