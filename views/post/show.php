<?php
if (isset($errors)) { ?>
  <div class="alert alert-danger">
    <ul><?php

foreach ($errors as $field => $error) {
echo "<li> le champ: "   .  $field . " est obligatoire.</li>";
} ?> </ul>
  </div><?php
} ?>

<div class="text-center">
<h2><?php echo e(mb_strtoupper($post->getName())); ?></h2>
<p class="text-muted text-left">Le <?= $post->getCreatedAt()->format('d F Y H:i') ?></p>

<h5 class="post-subtitle mb-5 text-center" ><b></b>
  <?= e($post->getChapo()) ?></h5></div>

<?php if ($post->getImage()) : ?>

  <div class="text-center">
    <img src="<?= $post->getImageURL('large') ?>" alt="image" style="width: 780px;">
  </div>

<?php endif; ?>
<p class="post-subtitle"><b></b><br></p>

<blockquote class="blockquote">
  <?= $post->getFormattedContent() ?></blockquote>Auteur(e) du post : <?= e($post->getAuthor()) ?><br>
<br>

<div class="box">
  <div class="d-flex justify-content-center">
    <button class="btn btn-secondary text-white"><?php echo count($comments); ?> commentaires à consulter <span class="badge badge-secondary">
    </span></button>
  </div> <br>
  <div class="bg-secondary">
    <div class="card">
      <div class="card-body">

        <blockquote class="blockquote_post">
          <?php foreach ($comments as $comment) { ?><br><hr>
            <?= $comment->getContent(); ?><br><br>Ecrit par : <?= e($comment->getAuthor()) ?>
            Le : <?= $comment->getCreatedAt()->format('d M Y H:m') ?>
<?php } ?>
    </blockquote>
      </div>
    </div>
  </div>
</div>

<div class="card " id="form_comment">
  <div class="text-center">
    <h4>Ecrire un commentaire:</h4><br></div>
    <form action= "/blog/<?php echo e($post->getSlug()); ?>-<?php echo e($post->getId()); ?>/comments"
    onsubmit="alert('Merci pour votre commentaire, il va être validé')" method="POST">
  <div>
    <label for="name">Auteur:</label>
    <input type="text" id="author" name="author" required>
  </div>

  <div>
    <label for="msg"> Votre message : </label>
    <textarea id="msg" name="content" required></textarea>
  </div>
  <div class="d-flex justify-content-center mt-2 ">
    <input type="submit" class="btn btn-secondary " value="Envoyer"><br>
  </div>
  </form>
</div>
