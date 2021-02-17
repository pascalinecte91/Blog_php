<?php

namespace App\Validators;

use App\Model\PostManager;

class PostValidator extends AbstractValidator
{
    public function __construct(array $data, PostManager $manager, ?int $postID = null)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['name', 'slug']);
        $this->validator->rule('lengthBetween', ['name', 'slug'], 3, 200);
        $this->validator->rule('slug', 'slug');
        $this->validator->rule('image', 'image');

        $this->validator->rule(function ($field, $value) use ($manager, $postID) {
            return !$manager->exists($field, $value, $postID);
        }, ['slug', 'name'], 'cette valeur est déjà utilisée');
    }
}