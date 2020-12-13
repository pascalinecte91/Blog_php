<?php
namespace App\Validators;


use App\Table\CommentTable;

class CommentValidator extends AbstractValidator {


    public function __construct(array $data, CommentTable $table, ?int $postID = null)
    {
        parent::__construct ($data);
        $this->validator->rule('required', ['author', 'content']);

        
    }

    
}
