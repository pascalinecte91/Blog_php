

<h5><?= e($post->getName()) ?></h5> 
<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y H:i') ?></p>
<?php foreach($post->getCategories() as $k => $category):
     if ($k > 0):
        echo ', ';
     endif;
        $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
        ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a><?php
    endforeach ?>
<p><?= $post->getFormattedContent() ?></P>
