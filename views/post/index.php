<?php 
if (!empty($_SESSION['auth']) &&  isset($_SESSION['message_section'])) {
 if ($_SESSION['message_section'] === 'connexion'):?> 
 
<div class="alert alert-info alert-dismissible text-center" style="width:380px" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <p> Bienvenue - Vous etes connectés  </p>  
</div>

<?php else: ?>
 
<div class="alert alert-info alert-dismissible text-center" style="width: 1380px" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <p style="font-size:30px;">BIENVENUE ! ****  Vous etes inscrits ****   FÉLICITATIONS  </p>  
</div>

<?php endif; unset($_SESSION['message_section']);?> 
<?php }?>


<div class="text-center p-2 mb-2">
    <h2> BLOG POSTS </h2><br>
</div>
<div class="row align-self-center">
    <div class="col-lg-12 col-md-10 mx-auto">
        

        <?php foreach ($posts as $post) : ?>
            <div class= "post-preview border border-secondary  mb-3">


                <div class="col-lg-12">
                <div class="text-center">
                <h3 class="post-title mt-3  ">
                    <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>">
                    <?php echo e(mb_strtoupper($post->getName())); ?>
                    </a>
                    </div>
                </h3>
                    <div class="row ml-2">
                        <p class="post-subtitle">
                            <?= e($post->getChapo()) ?></a>
                        </p>
                    </div>
                    <div class id="image">
                    <div class="row ml-2">
                        <?php if ($post->getImage()) : ?>
                            <img src="<?= $post->getImageURL('small') ?>" alt="image divers" class="img-thumbnail" style="width: 300px;">
                        <?php endif ?>


                        <p class="post-meta ml-5 ">

                            Auteur(e): <br>
                            <?= e($post->getAuthor()) ?></a>
                            - Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
                    </div>
                    </p>
                    </div>

                </div>
            </div>
            
        <?php endforeach ?>

    </div>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>