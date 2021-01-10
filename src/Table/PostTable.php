<?php

namespace App\Table;

use App\PaginatedQuery;
use App\Model\Post;
use \PDO;

final class PostTable extends Table
{
    protected $table = "post";
    protected $class = Post::class;

    public function updatePost(Post $post): void
    {
        $this->update([
      'name' => $post->getName(),
      'slug' => $post->getSlug(),
      'chapo' => $post->getChapo(),
      'content' => $post->getContent(),
      'image' => $post->getImage(),
      'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s'),
      'author' => $post->getAuthor(),


    ], $post->getID());
    }

    public function createPost(Post $post): void
    {
        $id = $this->create([
      'name' => $post->getName(),
      'slug' => $post->getSlug(),
      'chapo' => $post->getChapo(),
      'content' => $post->getContent(),
      'image' => $post->getImage(),
      'author' => $post->getAuthor(),
      'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s')
    ]);
        $post->setID($id);
    }





    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM {$this->table}",/* recupere tous les articles*/
      $this->pdo
        );

        $posts = $paginatedQuery->getItems(Post::class);
        (new PostTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }




    public function findByPostID($post_id)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table  .  ' WHERE post_id= :post_id');
        $query->execute(['post_id' => $post_id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();


        return $result;
    }
    public function hydratePosts(array $posts)
    {
        foreach ($posts as $post) {
            $post->setPost([]);
            /*  $postsByID[$post->getID()] = $post;  */
        }
        $posts = $this->pdo
      ->query('SELECT *
                  FROM post
                  WHERE id IN (' . implode(array_keys($posts)) . ')')
      ->fetchAll(PDO::FETCH_CLASS, $this->class);
    }
}
