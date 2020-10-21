<form action="" method="POST">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'Url'); ?>
    <?= $form->input('chapo', 'Chapo'); ?>
    <?= $form->input('author', 'Auteur (e)'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <?= $form->input('created_at', 'Modifié ou crée le'); ?>
    <h5>Cliquez sur le bouton pour l'action</h5>
    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary">

            <?php if ($post->getID() !== null) : ?>
                Modifier

            <?php else : ?>
            
                CréeR
            <?php endif ?>
        </button>
    </div>

</form>
<br>