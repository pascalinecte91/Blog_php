<form action="" method="POST">
    <?= $form->select('author', 'auteur(e)'); ?>
    <?= $form->textarea('comment', 'Commentaire'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-primary">
        <?php if ($post->getID() !==null): ?>
            Modifier
            <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>