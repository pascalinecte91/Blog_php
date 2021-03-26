
    <?php if (count($comments)<1) : ?>
      <div class="alert alert-info " role="alert ">
      Tous les commentaires sont  validés !
      </div>
    <?php endif ?>


    <div class="d-flex justify-content-center" >
        <h3>LES COMMENTAIRES À VALIDER</h3>
          </div><br>

          <div class="table-responsive-sm" id="table_comment">
            <table class="table">
              <thead class="center">
                <tr>
                    <th>Commentaires</th>
                    <th>Auteurs</th>
                    <th>Dates</th>
                    <th>Approuver</th>
                    <th>Refuser</th>
                      <th>Edit</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <?php foreach ($comments as $comment) :?>
                    <td><?= e($comment->getContent());?></td>
                    <td><?= e($comment->getAuthor())?><br></td>
                    <td><?= $comment->getCreatedAt()->format('d M y') ?></td>
                    <td><a href="<?= $router->url('admin_comment_approve', ['id' => e($comment->getID())]) ?>"onclick="alert('VALIDATION du commentaire OK')"class="btn btn-success">OK</a><br></td>
                    <td><a href="<?= $router->url('admin_comment_delete', ['id' => e($comment->getID())]) ?>"onclick="alert('SUPPRESSION du commentaire OK')"class="btn btn-danger">KO</a></td>
                    <td><a href="<?= $router->url('admin_comment', ['id' => e($comment->getID())]) ?>"class="btn btn-primary ">Edit</a>  
                  </td>
                </tr>
                <?php endforeach  ?> <br>    
              </tbody>
            </table>
        </div>

 

      