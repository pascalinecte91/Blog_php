<?php
namespace App\Validators;


use App\Table\CommentTable;

class CommentValidator extends AbstractValidator {


    public function __construct(array $data, CommentTable $table, ?int $postID = null)
    {
        parent::__construct ($data);
        $this->validator->rule('required', ['author', 'slug']);
        $this->validator->rule('lengthBetween', ['author', 'slug'], 3, 200);
     
       
        $this->validator->rule(function ($field, $value) use ($table, $postID) {
            return !$table->exists($value,$postID);
        }, ['slug', 'name'],'cette valeur est déjà utilisée');
        
    }

    
}
