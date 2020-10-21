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

                <h2 class="post-title">
                    <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>">
                        <?= e($post->getName()) ?>
                    </a>
                </h2>
                <p class="post-subtitle">  
                        <?= e($post->getChapo()) ?></a>
                </p>

                <p class="post-meta">
                    <p class="border .border-secondary mt-2 ">
                        Auteur(e): <br>
                        <?= e($post->getAuthor()) ?></a>
                         -   Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
                    </p>
                </p>

            </div>
            <?php $firstLine = false; ?>
        <?php endforeach ?>
    </div>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>

<?php

/* pour chapo  supprimé  lien a href : <p class="post-subtitle">
                    <a href="<?= $router->url('post', ['chapo' => $post->getChapo(), 'chapo' => $post->getChapo()]) ?>">
                        <?= e($post->getChapo()) ?></a>
                </p>*/
/* pour author: <p class="post-meta">
                    <a href="<?= $router->url('post', ['author' => $post->getAuthor(), 'author' => $post->getAuthor()]) ?>">
                        Posté par : auteur <br>
                        <?= e($post->getAuthor()) ?></a><br>

                    Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
                </p>*/