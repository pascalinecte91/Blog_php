<?php
namespace App\Model;

use App\Date_time;
use App\Helpers\Text;

class Comment {

    private $comment;

    private $date;

    private $name;


    public function getComment ():?int {
        return $this->comment;
    }

    public function setComment (): self
    {
        $this->comment = $comment;

        return $this;
    
    }

}