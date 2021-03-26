<?php
  if (isset($errors)) { ?>
    <div class="alert alert-danger">
      <ul><?php

  foreach ($errors as $field => $error) {
      echo "<li> le champ: "   .  $field . " est obligatoire.</li>";
  } ?> </ul>
    </div><?php
  } ?>
<div class="container">
  <div class id="show_post">
    <h3><?php echo e(mb_strtoupper($post->getName())); ?></h3>
    <h5 class="post-subtitle mb-5 text-center" ><b></b>
    <?= e($post->getChapo()) ?></h5>
  </div>

  <?php if ($post->getImage()) : ?>

    <div class="image-post">
      <img src="<?= $post->getImageURL('large') ?>" alt="image" class="img-fluid">
    </div>

  <?php endif; ?>
    <p class="post-subtitle"><b></b><br></p>
      <blockquote class="blockquote">
  <?= e($post->getFormattedContent()) ?>
    </blockquote>Auteur(e) du post : <?= e($post->getAuthor()) ?>
    Le <?= $post->getCreatedAt()->format('d F Y H:i') ?><br>

      <div class="box">
        <div class="d-flex justify-content-center">
          <button class="btn btn-secondary text-white"><?php echo count($comments); ?> commentaire(s) à consulter <span class="badge badge-secondary">
          </span></button>
        </div> <br>
      <div class="bg-secondary">
        <div class="card">
          <div class="card-body">
            <blockquote class="blockquote_post">
              <?php foreach ($comments as $comment) { ?><br><hr>
                <?= e($comment->getContent()); ?><br><br>Ecrit par : <?= e($comment->getAuthor()) ?>
                Le : <?= $comment->getCreatedAt()->format('d M Y H:m') ?>
              <?php } ?>
            </blockquote>
        </div>
      </div>
    </div>
  </div>


  
<h4>Ecrire un commentaire:</h4><br>
    
  <div class="card" id="form_comment">  
        <form action= "/blog/<?php echo e($post->getSlug()); ?>-<?php echo e($post->getId()); ?>/comments"
          onsubmit="alert ('Merci pour votre commentaire, il va être validé')" method="POST">
            <label for="name"></label>
              <input type="text" id="author" placeholder="Auteur" name="author" required >
                <label for="msg"></label>
                  <textarea id="msg" name="content" placeholder="Ecrivez ici votre message"required></textarea>
                  </div>
                  <div class="d-flex justify-content-center my-3 ">
                  <input type="submit" class="btn btn-secondary " value="Envoyer"><br>
              </div>
        </form>
  </div>
  