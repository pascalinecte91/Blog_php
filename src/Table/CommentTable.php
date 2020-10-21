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
      'chapo' => $comment->getChapo(),
      'content' => $comment->getContent(),
      'created_at' => $comment->getCreatedAt()->format('Y-m-d H:i:s'),
      'author' => $comment->getAuthor(),
    ]);
    $comment->setID($id);
  }

  public function hydrateComments(array $comments): void
  {
    $commentsByID = [];
    foreach ($comments as $comment) {
      $comment->setComments([]);
      $commentsByID[$comment->getID()] = $comment;
    }
  }
}
