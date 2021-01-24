<form action="" method="POST" enctype=" multipart/form-data">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'Url'); ?>
    <?= $form->input('chapo', 'Chapo'); ?>
    <?= $form->file('image', 'Image à la une'); ?>
    <?php if ($post->getImage()) : ?>
        <img src="<?= $post->getImageURL('small') ?>" alt="" style="width: 100%;">
    <?php endif ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <?= $form->input('author', 'Auteur (e)'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-secondary">
        <?php if ($post->getID() !== null) : ?>
            Modifier
        <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>
