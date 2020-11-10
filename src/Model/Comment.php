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
    

    public function getID (): ?int
    {
        return $this->id;
    }

    public function setID ($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent () :  ?string
    
    {
        return $this->content;
    }


    public function setContent (string $content) : self

    {
        $this->content = $content;
        
        return $this;
    }
    public function getComment () :  ?string
    
    {
        return $this->comment;
    }


    public function setComment (string $comment) : self

    {
        $this->comment= $comment;
        
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
        $this->content = $author;

        return $this;
    }
    
    public function findByPostID(): int {

        return $this->post_id;
    }
}
