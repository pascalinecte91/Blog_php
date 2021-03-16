<?php 
if (isset($_SESSION['message_section'])) {
    if ($_SESSION['message_section'] === 'comment_modif'): ?>
        <div class="alert alert-info alert-dismissible text-center" style="width:380px" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p>L'article a été modifié avec succès !</p>  
        </div>
    <?php endif; unset($_SESSION['message_section']); ?>
<?php } ?>
<table class="table" style="background-color:#cbb9cc">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre du Post</th>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) : ?>
        <td><?= $post->getID() ?></td>
        <td>
            <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>"></a>
            <?= e($post->getName()) ?>
        </td>
        <td>
            <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>" class="btn btn-secondary">
                MODIFIER</a>
        </td>
        <td>
            <form action="<?= $router->url('admin_post_delete', ['id' => $post->getID()]) ?>" method="POST"
                onsubmit="return confirm('Voulez vous confirmer la suppression ?')" style="display:inline">
                <button type="submit" class="btn btn-danger ">Supprimer</button>
            </form>
        </td>
        <td>
            <a href="<?= $router->url('admin_comment_list', ['id' => $post->getID()]) ?>" class="btn btn-primary">Action
                commentaires
            </a> <br>
        </td>
        </tr>
        <?php endforeach  ?>
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <a href="<?= $router->url('admin_post_new')  ?>" class="btn btn-secondary">Creer un post</a></th>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>