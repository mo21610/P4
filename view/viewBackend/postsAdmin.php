

    
<?php $title = "Page d'administration du blog" ?>


<?php ob_start(); ?>

    <div class="container-fluid">

        <?php foreach ($posts as $post){ ?> 
            <table class="table table-striped">
                <tr class=row>
                    <td class="col-md-2"><h3><?= $post->title() ?></h3></td>
                    <td class="col-md-8"><?=substr($post->post(), 0, 250); ?>...</td>
                    <td class=col-md-1><a class="btn btn-info" href="index.php?action=updatePost&post=<?= $post->id(); ?>" role="button">Modifier</a></td>
                    <td class=col-md-1><a class="btn btn-danger" href="index.php?action=postsAdmin&post=<?= $post->id(); ?>" role="button">Supprimer</a></td>
                </tr>
            </table>
        <?php } ?>
    </div>

    
    <?php $content = ob_get_clean(); ?>

<?php require('template_admin.php'); ?>