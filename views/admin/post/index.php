<?php if (isset($_GET['delete'])) : ?>
     <div class="container-fluid">
        
        <div class=" alerte alert-succes">L'enregistrement a bien été supprimé!
        </div>
<?php endif ?>

<table class="table" style="background-color:#CCCCFF">
    <thead>
        <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Action</th>
    </thead>
    <tbody>
         <?php foreach ($posts as $post) : ?>

            <td><?= $post->getID() ?></td>
            <td>
                <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>">
                    <?= e($post->getName()) ?>
                </a>
            </td>
            <td>
                <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>" class="btn btn-secondary">
                    MODIFIER
                </a>
            </td>


            <td>
                <form action="<?= $router->url('admin_post_delete', ['id' => $post->getID()]) ?>" method="POST" onsubmit="return confirm('Voulez vous confirmer la suppression ?')" style="display:inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
            <td>
    
            <a href="<?= $router->url('admin_comment_list', ['id'=> $post->getID()]) ?>" class="btn btn-dark">
          
                    Voir commentaires
                </a>
                   
                
            </td>
        
            </tr>
        </div>
        <?php endforeach  ?>
    </tbody>
    </div>
</table>

<div class="d-flex justify-content-center">
    <a href="<?= $router->url('admin_post_new')  ?>" class="btn btn-secondary">Creer un post</a></th>
</div>


<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>