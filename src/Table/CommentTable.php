<?php

namespace App\Table;


use App\Model\Comment;
use\App\PaginatedQuery;
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
    ]);
    $comment->setID($id);
  }

  public function hydrateComments(array $comments)
  {
    
    foreach ($comments as $comment) {
      $comment->setComment([]);
      $commentsByID[$comment->getID()] = $comment;  
    }
    $comments = $this->pdo
            ->query('SELECT content, post_id 
                FROM comment 
                WHERE post_id IN (' . implode(array_keys($comments)) . ')')
            ->fetchAll(PDO::FETCH_CLASS, $this->class);
   

  }
  public function findPaginated() {
    $paginatedQuery = new PaginatedQuery(
        "SELECT * FROM {$this->table} ORDER BY created_at DESC",
        "SELECT COUNT(id) FROM {$this->table}",/* recupere tous les articles*/
        $this->pdo
    );
    $posts = $paginatedQuery->getItems(Post::class);
    (new CommentTable($this->pdo))->hydrateComments($posts);
    return [$posts, $paginatedQuery];
}
public function findByPostID($post_id)

{
  $query = $this->pdo->prepare('SELECT * FROM ' . $this->table  .  ' WHERE post_id = :post_id');
  $query->execute(['post_id'=> $post_id]);

  
  $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
  $result = $query->fetchAll();
  
  return $result;
 
}
}

