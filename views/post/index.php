<div class="text-center p-2 mb-2">
    <h2> blog Posts </h2><br>
</div>
<div class="row align-self-center">
    <div class="col-lg-12 col-md-10 mx-auto">
        <?php $firstLine = true; ?>

        <?php foreach ($posts as $post) : ?>
            <?php if (!$firstLine) : ?>
                <hr>

            <?php endif; ?>
            <div class="post-preview">

                <h3 class="post-title">
                    <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>">
                        <?= e($post->getName()) ?>
                    </a>
                </h3>

                <div class="col-lg-12">
                    <div class="row">
                        <p class="post-subtitle">
                            <?= e($post->getChapo()) ?></a>
                        </p>
                    </div>
                    <div class="row">
                    <?php if ($post->getImage()) : ?>
                        <img src="<?= $post->getImageURL('small') ?>" alt="" style="width: 200px;">
                    <?php endif ?>

                
                <p class="post-meta ml-5">

                    Auteur(e): <br>
                    <?= e($post->getAuthor()) ?></a>
                    - Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
                    </div>
                </p>
                

            </div>
            <?php $firstLine = false; ?>
        <?php endforeach ?>
    </div>


    <div class="d-flex justify-content-between my-4">
        <?= $pagination->previousLink($link) ?>
        <?= $pagination->nextLink($link) ?>
    </div>

    <?php

