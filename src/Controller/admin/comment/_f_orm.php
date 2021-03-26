<form action="/blog/<?php echo e($post->getSlug()); ?>-<?php echo e($post->getId()); ?>/comments" method="POST">
  <div>
    <label for="name">Auteur:</label>
    <input type="text" id="name" name="author">
  </div>
</form>
