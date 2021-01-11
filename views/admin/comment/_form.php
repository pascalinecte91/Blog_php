<form action="" method="POST">
    <?= $form->input('author', 'auteur(e)'); ?>
    <?= $form->textarea('content', 'Commentaire'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <div class="d-flex justify-content-center">
    <button class="btn btn-secondary">
        <?php if ($comment->getID() !== null) : ?>
            Modifier
        </div><br>
        <?php else : ?>
            Créer
        <?php endif ?>
    </button>
</form>


<?php foreach ($comments as $comment) { ?>
    <br>
    <hr>
    <?= $comment->getContent();

    ?><br>
    Ecrit par : <?= e($comment->getAuthor()) ?><br>
    Le : <?= $comment->getCreatedAt()->format('d M Y H:m') ?>
<?php } ?>