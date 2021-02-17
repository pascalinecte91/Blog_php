<?php

namespace App\Validators;

use App\Model\CommentManager;

class CommentValidator extends AbstractValidator
{
    public function __construct(array $data, CommentManager $manager, ?int $postID = null)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['author', 'content']);
    }
}