<?php

namespace App\Model;

use \DateTime;

class Comment
{
    private $id;

    private $content;

    private $created_at;

    private $author;

    private $post_id;

    private $is_valid;



    public function getID(): ?int
    {
        return $this->id;
    }

    public function setID($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }


    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }
    public function getComment(): ?string
    {
        return $this->comment;
    }


    public function setComment($comment): self
    {
        $this->comment = $comment;

        return $this;
    }



    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }

    public function setCreatedAt(string $date): self
    {
        $this->created_at = $date;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }


    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function setPostId(int $post_id): self
    {
        $this->post_id = $post_id;

        return $this;
    }
    

    public function setPost(Post $post)
    {
        $this->post = $post;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getIsValid()
    {
        return $this->is_valid;
    }

    public function validate() 
    {
        $content= trim($this->getContent());
        if (!empty($content)) {
            return true;
        } else {
            return false;
        }
    }
}