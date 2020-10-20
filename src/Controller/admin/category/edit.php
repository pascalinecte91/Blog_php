<?php
use App \Connection;
use App \Table\CategoryTable;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connection:: getPDO();
//je recupere la table : categorie table
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);
$success = false;
$errors = [];
$fields = ['name', 'slug', 'chapo'];

if (!empty($_POST)) {
    $v = new CategoryValidator($_POST, $table, $item->getID());
    ObjectHelper::hydrate($item, $_POST, $fields);
    if ($v->validate()) {
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSlug(),
        ], $item->getID());
        $success = true;

    } else {
       $errors = $v->errors();  
    }
}
$form = new Form($item, $errors);
require_once ('../views/admin/category/edit.php');

