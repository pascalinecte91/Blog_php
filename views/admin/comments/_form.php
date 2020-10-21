<form action="" method="POST">
    <?= $form->input('name','Titre'); ?>
    <?= $form->input('chapo', 'chapo'); ?>
    <?= $form->select('author', 'auteur(e)'); ?>
    <?= $form->textarea('comment', 'Commentaire'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-secondary">
        <?php if ($comment->getID() !==null): ?>
            Modifier
            <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>