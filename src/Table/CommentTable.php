<?php
namespace App\Table;


use App\Model\Comment;

final class CommentTable extends Table {

    protected $table = "comment";
    protected $class = Comment::class;

  
    

    public function createComment (Comment $comment): void 
    {
        $id = $this->create([
          'name'=> $comment->getComment(),
          'created_at'=> $comment->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        $query = $this->pdo->prepare('INSERT INTO comment SET comment_id= ?, = ?');
        foreach($comments as $comment) {
            $query->execute([$comment]);
       }
        $comments->setComment();
    }
    
    }

