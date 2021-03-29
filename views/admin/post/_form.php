<form method="POST" enctype="multipart/form-data">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('chapo', 'Chapo'); ?>
    <div class="row">
      <div class="col-md-9">
      <?= $form->file('image', 'Image à la une'); ?>
        </div>
          <div class="col-md-3">
            <?php if ($post->getImage()) : ?>
              <img src="<?= $post->getImageURL('small') ?>" id="image_show" alt="image">
            <?php endif ?>
            </div>
        </div>
          <?= $form->textarea('content', 'Contenu'); ?>
          <?= $form->input('author', 'Auteur (e)'); ?>
            <div class="d-flex justify-content-center">
              <button class="btn btn-secondary" type="submit">
          <?php if ($post->getID() !== null) : ?>Modifier
          <?php else : ?>Créer
          <?php endif ?>
              </button>
        </div><br>
</form>