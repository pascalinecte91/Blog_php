
<?php if (isset($_GET ['delete'])): ?>
<div class="alerte alert-succes">
    Le commentaire a ete supprimé!
</div>
<?php endif ?>

<table class="table">
    <thead>
    <th>Numéro</th>
    <th>Titre  Commentaire</th>
    
    <th>
        <a href ="<?= $router->url('admin_comment_new')  ?>" class="btn btn-secondary">New comment</a>
    </th>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
        <tr>
            <td>#<?= $item->getID() ?></td>
            <td>
                <a href="<?= $router->url('admin_comment', ['id'=> $item->getID()])?>">
                <?= e($item->getName()) ?>
                </a>
            </td>
            <td><?= $item->getSlug() ?></td>
            <td>

                <a href="<?= $router->url('admin_comment', ['id'=> $item->getID()])?>" class="btn btn-secondary">
                Editer
            </td>
            <td>
                <form action="<?= $router->url('admin_comment_delete', ['id'=> $item->getID()])?>" method ="POST"
                onsubmit="return confirm('Voulez vous confirmer la suppression ?')" style="display:inline">
                <button type ="submit" class="btn btn-danger">Supprimer</button>
            </form>
            </td>

        </a>
    </tr>
    <?php endforeach  ?>
</tbody>
</table>


