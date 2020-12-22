
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
                   
                    <td class="col-2 text-center"><?php if ($comment->getIsValid()){
                                                   echo "";} 
                    ?>
                    
                    <div class="row">
                    <a href="<?= $router->url('admin_comment_approve', ['id' => $comment->getID()]) ?>" class="btn btn-success pr-2 ml-2 ">OK</a>
                    <br>
                    
                    <a href="<?= $router->url('admin_comment_delete', ['id' => $comment->getID()]) ?>" class="btn btn-danger pr-2">KO</a>
                    </div></td>

                        
                    </tr>     
                    <?php endforeach  ?> <br>     
        </tbody>
    </table>


