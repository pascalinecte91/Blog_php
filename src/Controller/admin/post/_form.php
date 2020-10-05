<form action="" method="POST">
    <?= $form->input('name','Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <?= $form->select('categories_ids', 'Catégories', $categories); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-primary" style="background-color:#3dc0ad">
        <?php if ($post->getID() !==null): ?>
            Modifier
            <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>
