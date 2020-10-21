<form action="" method="POST">
    <?= $form->input('name','Titre'); ?>
    <?= $form->input('slug', 'Url'); ?>
    <?= $form->input('chapo', 'Chapo'); ?>
    <?= $form->input('author', 'Auteur(e)'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-secondary">
        <?php if ($post->getID() !==null): ?>
            Modifier
            <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>
