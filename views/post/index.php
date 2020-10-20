
    <div class="text-center">
<h1> Mon blog </h1>
</div>
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
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
                    Chapo
                </p>

                <p class="post-meta">

                    Posté par : auteur <br>
                    Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
                </p>

            </div>
            <?php $firstLine = false; ?>
        <?php endforeach ?>


    </div>
</div>
    </div>


<?php 
/*
foreach($comments as $comment): ?>
    <div class="col-lg-12"> 
    <?php require 'card.php' ?>     
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
    </div>*/