
<?php if (isset($_GET ['delete'])): ?>

<div class="alerte alert-succes">
    L'enregistrement a bien été supprimé!
</div>
<?php endif ?>

<table class="table" style="background-color:#a5b5b8">
<thead>
    <th>Numéro Post</th>
 
    <th>Titre</th>
    <th>
        <a href ="<?= $router->url('admin_post_new')  ?>" class="btn btn-danger"style="background-color:#3dc0ad">New post</a></th>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td>#<?= $post->getID() ?></td>
            <td>
                <a href="<?= $router->url('admin_post', ['id'=> $post->getID()])?>">
                <?= e($post->getName()) ?></td>
            <td>
                <a href="<?= $router->url('admin_post', ['id'=> $post->getID()])?>" class="btn btn-primary" style="background-color:#3dc0ad">
                Editer
            </td>
          
            <td>
                <a href="<?= $router->url('admin_post', ['id'=> $post->getID()])?>" class="btn btn-info">
                Commentaires
            </td>
        <td>
                <form action="<?= $router->url('admin_post_delete', ['id'=> $post->getID()])?>" method ="POST"
                onsubmit="return confirm('Voulez vous confirmer la suppression ?')" style="display:inline">
                <button type ="submit" class="btn btn-danger" >Supprimer</button>
            </form>
            </td>

        </a>
    </tr>
    <?php endforeach  ?>
</tbody>
</table>



<div class="d-flex justify-content-end my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>
