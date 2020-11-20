<h2><?= e($post->getName()) ?></h2>
          <p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y H:i') ?></p>

          <h5 class="post-subtitle">Chapo:<br>
            <?= e($post->getChapo()) ?>
            <hr>
          </h5>

          <?php if ($post->getImage()) : ?>

            
              <div class="text-center">
                <img src="<?= $post->getImageURL('large') ?>" alt="image" style="width: 780px;">
              </div>
            
          <?php endif ?>
          <p class="post-subtitle"> Sujet:<br></p>

          
          <blockquote class="blockquote">
            <?= $post->getFormattedContent() ?>

          </blockquote>


          Auteur(e) du post : <?= e($post->getAuthor()) ?><br>
          Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
          <hr>




          <div class="box">
            <div class="d-flex justify-content-center">
              <button class="btn btn-secondary text-white"><?php echo count($comments); ?> commentaires à consulter  <span class="badge badge-secondary"></span></button>
            </div> <br>
            <hr>
              <div class="bg-secondary">       
                <div class="card">
                  <div class="card-body">
      
                    <blockquote class="blockquote_post">
                    <?php foreach ($comments as $comment) {?> 
                    <br><hr>
                    <?= $comment->getContent(); 
                    ?><br>
                    Ecrit par : <?= e($comment->getAuthor()) ?><br>
                    Le : <?= $comment->getCreatedAt()->format('d M Y H:m') ?>
                    <?php } ?>
                    </blockquote>
                  </div>
                </div>
              </div>
          </div>
 




       
               

          <div class="card" id=form_comment>
            <h4 align="center">  Ecrire un commentaire : </h4><br>
            <form action="/blog/<?php echo e($post->getSlug()); ?>-<?php echo e($post->getId()); ?>/comments" method="post">
              <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="user_name">
              </div>
              <div>
                <label for="surname">Prénom:</label>
                <input type="text" id="surname" surname="user_surname">
              </div>
              <div>
                <label for="msg"> Votre message : </label>
                <textarea id="msg" name="user_message"></textarea>
              </div>
              <div class="d-flex justify-content-center">
              
                <button type="submit"> Envoyer LE MESSAGE</button><br>
              </div>
              </div>
          </div>
          </div>
          </div>
      
          </form>
      </div>
          <?php
