
<?php $title = 'Billet' ?>
<?php $h1 = $post->title(); ?>
<?php ob_start(); ?>
<div class="container-fluid"> 
    <div class="text-right">
        <a class="btn btn-secondary" id="return_button" href="index.php?action=posts">Retour à la liste des billets</a>
    </div>
    <p><?= $post->post() ?></p>
    <p class="date_post">Le <?= $post->datePost()  ?></p>
    <h2>Commentaires</h2>
    <?php foreach ($comments as $comment) { ?>
        <table class="table">
            <tr>
                <td class="col-md-2"><p><b><?= $comment->author() ?></b> <br/> Le <?= $comment->dateComment() ?></p></td>
                <td class="col-md-9"><p><?= $comment->comment()  ?></p></td>
                <td class="col-md-1"><a class="btn btn-danger" href="index.php?action=post&post=<?= $id_post ?>&comment=<?= $comment->id(); ?>&report=<?= $comment->report(); ?>">Signaler</a></td>                  
            </tr>
        </table>
    <?php } ?>

    <h2>Ajouter un commentaire</h2>
    <form class="col-md-5 col-xs-12" action="index.php?action=post&post=<?= $id_post ?>" method="post">
        Pseudo: <br><input class="form-control" type="text" name="author" class="form_comment"><br>
        Commentaire: <br><textarea class="form-control" name="comment" class="form_comment"></textarea><br>
        <button class="btn btn-secondary" type="submit">Ajouter un commentaire</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
