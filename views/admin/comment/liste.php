
    <div class="d-flex justify-content-center" style="font-size: 35px;">
       <?php echo "COMMENTAIRES A VALIDER"; ?>
    </div><br>
    

    <table class="table " style="background-color:#CCCCFF">
        <thead>

            <tr class="d-flex">
               
                <th class="col-7 text-center">comment</th>
                <th class="col-1 text-center">écrit par</th>
                <th class="col-1 text-center">date</th>
                <th class="col-2 text-right">O/N</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($comments as $comment) : ?>


                <tr class="d-flex">
                    
             
                    <td class="col-7 text-justify"><?= $comment->getContent();  ?></td>
                
                    <td class="col-1 text-center"><?= e($comment->getAuthor()) ?><br></td>

                    <td class="col-2"> <?= $comment->getCreatedAt()->format('d M Y ') ?></td>
                   
                    <td class="col-2 text-center">
                    
                  
                    
                    <div class="row">
                    <?php
                    if ($comment->getIsValid()){
                       $ok; 
                    }
                    ?>
                    <a href="<?= $router->url('admin_comment_approve', ['id' => $comment->getID()]) ?>" class="btn btn-success mr-2 mb-2 ">OK</a><br> 
                    <a href="<?= $router->url('admin_comment_delete',  ['id' => $comment->getID()]) ?>" class="btn btn-danger mb-2 ">KO</a>
                    <a href="<?= $router->url('admin_comment_delete',  ['id' => $comment->getID()]) ?>" class="btn btn-primary mb-2 ">validé</a>
                    </div></td>
                  
                    </tr>     
                    <?php endforeach  ?> <br>     
        </tbody>
    </table>


