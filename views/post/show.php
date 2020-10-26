          <h2><?= e($post->getName()) ?></h2>
          <p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y H:i') ?></p>

          <h5 class="post-subtitle">Chapo:<br>
            <?= e($post->getChapo()) ?>
            <hr>
          </h5>

          <?php if ($post->getImage()) : ?>

            <p>
              <div class="text-center">
                <img src="<?= $post->getImageURL('large') ?>" alt="image" style="width: 780px;">
              </div>
            </p>
          <?php endif ?>
          <p class="post-subtitle"> Sujet:<br></p>


          <blockquote class="blockquote">
            <p><?= $post->getFormattedContent() ?></p>

          </blockquote>


          Auteur(e) du post : <?= e($post->getAuthor()) ?><br>
          Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
          <hr>


          <button type="button" class="btn btn-secondary">
            nbre commentaires <span class="badge badge-secondary">4</span>
          </button>

          <div class="card">
            <div class="card-body">

              <blockquote class="blockquote_post">
                <?= e($comment->getcontent()) ?>
                <?= $comment->getcomment(); ?><br><br>

                Ecrit par : <?= e($comment->getAuthor()) ?><br>

                Le : <?= $comment->getCreatedAt()->format('d M Y H:m') ?>
            </div>
          </div>


          <div class="card" id=form_comment>
            <h5>Laisser un commentaire : </h5><br>
            <form action="traitment" method="post">
              <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="user_name">
              </div>
              <div>
                <label for="mail">votre Email :</label>
                <input type="email" id="mail" name="user_mail">
              </div>
              <div>
                <label for="msg"> Votre message : </label>
                <textarea id="msg" name="user_message"></textarea>
              </div>
              <div class="d-flex justify-content-center">
              <div class="button" class="btn btn-secondary"><br>
                <button type="button"> Envoyer LE MESSAGE</button><br>
              </div>
              </div>
          </div>
          </div>
          </div>
          </form>
          <?php
