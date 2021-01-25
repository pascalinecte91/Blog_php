<?php if(!empty($errors)): ?>
 <div class="alert alert-dark alert-dismissible" style="width: 550px;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
        <p> les champs ne sont pas conforment</p>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?> </li>

    <?php endforeach; ?>
</ul>
</div>

<?php  endif;?>