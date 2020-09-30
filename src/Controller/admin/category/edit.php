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
$fields = ['name', 'slug',];

if (!empty($_POST)) {
    //si les donnees ne sont pas vides : on utilise la categorie validator
    $v = new CategoryValidator($_POST, $table, $item->getID());
    ObjectHelper::hydrate($item, $_POST, $fields);
    if ($v->validate()) {
        //si les donnees sont ok : on fait un update
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSlug(),
        ], $item->getID());
        $success = true;

    } else {
        //sinon si les donnees sont pas ok : on envoir errors
       $errors = $v->errors();  
    }
}
//le formulaire est cree avec   $item 
$form = new Form($item, $errors);
require_once ('../views/admin/category/edit.php');

