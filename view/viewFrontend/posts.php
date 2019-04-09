    <?php $title = "Page d'accueil" ?>
    <?php $h1 = "Billet simple pour l'Alaska" ?>
    <?php ob_start(); ?>

    <?php foreach ($posts as $post) { ?> 
        <div class="jumbotron offset-1 col-md-10 text-white bg-dark" id="posts">
            <h2 class="font-italic" id="h2_list_post"><?= $post->title() ?></h2>
            <p><?= substr($post->post(), 0, 250); ?> ...</p>
            <p><i>Le <?= $post->datePost() ?></i></p>
            <a href="index.php?action=post&post=<?= $post->id(); ?>"><i>Lire la suite</i></a>
        </div>
    <?php } ?>  

    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>