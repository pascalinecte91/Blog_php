<?php if (isset($_GET['delete'])) : ?>
    <div class="container-fluid">

        <div class=" alerte alert-succes">Le commentaire a bien été supprimé!!
        </div>
    <?php endif ?>>

    <?php if (count($comments)<0) : ?>
        <div class=" alert alert-danger" style="max-width: 400px;"> BONJOUR ! Aucun commentaire à traiter !
        </div>
    <?php endif ?>

    <div class id="table_admin">
   <div class="d-flex justify-content-center" style="font-size: 35px;">
       <h3>COMMENTAIRES A VALIDER</h3>
   </div><br>

   <table class="table " style="background-color:#cbb9cc" text-align-center>
       <thead>
    <div class="col-12">
           <tr class="row" text-align-center>

               <th class="col-5 text-center">Commentaires</th>
               <th class="col-2 text-center">Auteurs</th>
               <th class="col-1 text-center">Dates</th>
               <th class="col-3 text-right">Approuver &ensp;Refuser &emsp;Modifier&emsp;</th>
           </tr>
           </div>
       </thead>

       <tbody>

           <?php foreach ($comments as $comment) : ?>
               <tr class="d-flex">
                   <td class="col-5 text-justify"><?= $comment->getContent();  ?></td>
                   <td class="col-2 text-center"><?= e($comment->getAuthor()) ?><br></td>
                   <td class="col-2"><?= $comment->getCreatedAt()->format('d M y h:m ') ?></td>
                   <td class="col-3 text-center">
                       <div class="row">

                           <a href="<?= $router->url('admin_comment_approve', ['id' => $comment->getID()]) ?>" class="btn btn-success mr-2 mb-2 ">OK</a><br>
                           <a href="<?= $router->url('admin_comment_delete', ['id' => $comment->getID()]) ?>" class="btn btn-danger mb-2 ">KO</a>
                           <a href="<?= $router->url('admin_comment', ['id' => $comment->getID()]) ?>" class="btn btn-primary ml-2 mb-2 ">Edit</a>

                   </td>
               </tr>

           <?php endforeach  ?> <br>
       </tbody>
   </table>
</div>
