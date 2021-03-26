<?php
if (isset($_SESSION['message_section'])) {
    if ($_SESSION['message_section'] === 'post_modif'): ?>
    <div class="dismiss_short">
      <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p>L'article a été modifié avec succès !</p>  
      </div>
  </div>
<?php endif;
    unset($_SESSION['message_section']); ?>
<?php
} ?>

<?php
if (isset($_SESSION['message_section_c'])) {
        if ($_SESSION['message_section_c'] === 'comment_modif'): ?>
    <div class="dismiss_short">
      <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p>Le commentaire a été modifié avec succès !</p>  
      </div>
  </div>
<?php endif;
        unset($_SESSION['message_section_c']); ?>
<?php
    } ?>

    
<div class="table-responsive-sm">
<table class="table">
  <thead class="center">
    <tr>
      <th>ID</th>
      <th>Titre du Post</th>
    </tr>
</thead>
  <tbody>
    <tr>
      <?php foreach ($posts as $post) : ?>
      <td><?= $post->getID() ?></td>
      <td><a href="<?= $router->url('admin_post', ['id' => e($post->getID())]) ?>"></a>
      <?= e($post->getName()) ?></td>
      <td><a href="<?= $router->url('admin_post', ['id' => e($post->getID())]) ?>" class="btn btn-secondary">MODIFIER</a></td>
      <td><form action="<?= $router->url('admin_post_delete', ['id' => e($post->getID())]) ?>" method="POST"onsubmit="return confirm('Voulez vous confirmer la suppression ?')">
            <button type="submit" class="btn btn-danger ">Supprimer</button>
          </form>
      </td>
            <td><a href="<?= $router->url('admin_comment_list', ['id' => e($post->getID())]) ?>" class="btn btn-primary">Action commentaires</a> <br>
        </td>
      </tr>
    <?php endforeach  ?>
  </tbody>
</table>
</div>
<div class="d-flex justify-content-center"><a href="<?= $router->url('admin_post_new')  ?>" class="btn btn-secondary">Creer un post</a></th>
  </div>
<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
  </div>