<?php $title = 'Page des commentaires signalés' ?>
<?php ob_start(); ?>
<?php foreach ($commentsReport as $commentReport){ ?>
    <table class="table table-striped">
        <tr class=row>
            <td class="col-md-2 text-center"><p><b><?= $commentReport->author() ?></b></p></td>
            <td class="col-md-8"><p><?= $commentReport->comment() ?></p></td>
            <td class=col-md-1><a class="btn btn-info" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>&report=<?= $commentReport->report() ?>" role="button">Autoriser</a></td>
            <td class=col-md-1><a class="btn btn-danger" href="index.php?action=commentsReport&comment=<?= $commentReport->id(); ?>" role="button">Supprimer</a></td>
        </tr>
    </table>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require('template_admin.php'); ?>
