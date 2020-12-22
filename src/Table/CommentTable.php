<?php

namespace App\Table;


use App\Model\Comment;
use App\PaginatedQuery;
use \PDO;

final class CommentTable extends Table
{

  protected $table = "comment";
  protected $class = Comment::class;


  
  public function createComment(Comment $comment): void
  {
  
    $id = $this->create([
      'content' => $comment->getContent(),
      'created_at' => $comment->getCreatedAt()->format('Y-m-d H:i:s'),
      'author' => $comment->getAuthor(),
      'post_id'=> $comment->getPostId()
    ]);
    $comment->setID($id);
  }
 
    public function addComment(int $id, array $comments) {

      $query = $this->pdo->prepare("INSERT INTO comment SET 'author', 'content', 'post_id' VALUES");
      $query->execute(['author','content','post_id']);
      
      $result = $query->fetchAll();
  

    if ($result === true) {
      echo 'Vos données ont bien eté enregistrees';
    }
        else {
          echo 'merci de recommencer';
        } 
  
  return $result;
  

}


  public function hydrateComments(array $comments){
    
    foreach ($comments as $comment) {
      $comment->setComment([]);
    
     /* $commentsByID[$comment->getID()] = $comment;  */
     
    }
    $comments = $this->pdo
            ->query('SELECT content, post_id 
                FROM comment 
                WHERE post_id = ' . $comment->getPostId()  )
            ->fetchAll(PDO::FETCH_CLASS, $this->class);
   

  }
  public function findPaginated() {
    $paginatedQuery = new PaginatedQuery(
        "SELECT * FROM {$this->table} ORDER BY created_at DESC",
        "SELECT COUNT(id) FROM {$this->table}",/* recupere tous les articles*/
        $this->pdo
    );
    $comments = $paginatedQuery->getItems(Comment::class);
    
    (new CommentTable($this->pdo))->hydrateComments($comments);
    return [$comments, $paginatedQuery];
}

public function findByPostID($post_id)
{
  $query = $this->pdo->prepare('SELECT * FROM ' . $this->table  .  ' WHERE post_id = :post_id');
  $query->execute(['post_id'=> $post_id]);
  $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
  $result = $query->fetchAll();
  
  return $result;
 
}
public function approve (Comment $comment): void 
{
   $this->update([
      'is_valid'=> 1
     
      
      
   ], $comment->getID());

}
public function findByID($comment_id)
{
  $query = $this->pdo->prepare('SELECT * FROM ' . $this->table  .  ' WHERE id= :id');
  $query->execute(['id'=> $comment_id]);
  $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
  $result = $query->fetch();


  return $result;
}
}

