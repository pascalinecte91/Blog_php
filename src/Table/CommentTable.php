<?php

namespace App\Table;


use App\Model\Comment;
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

  public function hydratePosts(array $posts): void
  {
    $commentsByID = [];
    foreach ($comments as $comment) {
      $comment->setComments([]);
      $commentsByID[$comment->getID()] = $comment;
    }
  }
  public function findPaginated() {
    $paginatedQuery = new PaginatedQuery(
        "SELECT * FROM {$this->table} ORDER BY created_at DESC",
        "SELECT COUNT(id) FROM {$this->table}",/* recupere tous les articles*/
        $this->pdo
    );
    $posts = $paginatedQuery->getItems(Post::class);
    (new CategoryTable($this->pdo))->hydratePosts($posts);
    return [$posts, $paginatedQuery];
}

}
