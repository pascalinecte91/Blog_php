<?php
if (!empty($_SESSION['auth']) &&  isset($_SESSION['message_section'])) {
    if ($_SESSION['message_section'] === 'connexion'):?> 
        <div class="dismiss_short">
            <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p> Bienvenue - Vous etes connectés  </p>  
            </div>
        </div>

<?php else: ?>
        <div class="dismiss_lenght">
            <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p>BIENVENUE ! ****  Vous etes inscrits ****   FÉLICITATIONS  </p>  
            </div>
        </div>

<?php endif;
    unset($_SESSION['message_section']); ?> 
<?php
}?>

<div class="text-center p-2 mb-2">
    <h2> BLOG POSTS </h2><br>
</div>
<div class="row align-self-center">
    <div class="col-lg-12 col-md-10 mx-auto">
        
        <?php foreach ($posts as $post) : ?>
            <div class= "post-preview border border-secondary  mb-3 mx-3">
                <h3 class="post-title">
                    <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>">
                    <?php echo e(mb_strtoupper($post->getName())); ?></a>
                </h3>
                      <div class="row ml-2">
                        <p class="post-subtitle">
                            <?= e($post->getChapo()) ?></p>
                      </div>
                          <div class="text-center">
                            <?php if ($post->getImage()) : ?>
                            <img src="<?= $post->getImageURL('small') ?>" class="center-block" alt="image divers">
                            <?php endif ?>
                          </div>
                              <div class="tex-center">
                               <p class="post-meta  ">Auteur(e): <br><?= e($post->getAuthor()) ?> - Le: <?= $post->getCreatedAt()->format('d F Y') ?></p>
                               <?php
                               if ($post->getDateLastModification()!=null) {
                                   ?>
                               <p class="post-meta  ">Modifié le: <?= $post->getDateLastModification()->format('d F Y') ?></p>
                                <?php
                               } ?>
                            </div>
                        </div>  
        <?php endforeach ?>
  </div>
</div>
  <div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
  </div>