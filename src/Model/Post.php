<?php
namespace App\Model;

use App\Helpers\Text;
use \DateTime;


class Post {
   
    private $id;

    private $slug;

    private $name;

    private $content;

    private $created_at;

    private $categories = [];

    private $comment =[];

   
    public function getName (): ?string
    {
        return $this->name;
    }

    public function setname (string $name) : self
    {
        $this->name = $name;

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

    public function getFormattedContent (): ?string 
    {
        return nl2br(e($this->content));
    }

    public function getExcerpt (): ?string 
    {
        if ($this->content === null) {
            return null;
        }
        return nl2br(e(Text::excerpt($this->content, 60)));
    }

    public function getCreatedAt (): DateTime  
    {
        return new DateTime($this->created_at);
    }

    public function setCreatedAt (string $date): self
    {
        $this->created_at = $date;

        return $this;
    }

    public function getComment (): ?self 
    {
        return $this->$comment;
    }

    public function setComment (): self
    {
        $this->comment = $comment;

        return $this;
    }


    public function getSlug (): ?string
    {
        return $this->slug;
    }

    public function setSlug (string $slug): self
    {
        $this->slug = $slug;

        return $this;

    }

    public function getID (): ?int
    {
        return $this->id;
    }

    public function setID (int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCategories (): array
    {
        return $this->categories;
    }
 

    public function getCategoriesIds(): array {
        $ids = [];
        foreach($this->categories as $category) {
            $ids[] = $category->getID();
        }
        return $ids;
    }

    public function setCategories (array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }


    public function addCategory (Category $Category): void
    {
        $this->categories[] = $Category;
    }
    
 }
