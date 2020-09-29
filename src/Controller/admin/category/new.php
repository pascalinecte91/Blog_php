<?php
use App \Connection;
use App \Table\CategoryTable;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Model\Category;
use App\Auth;

Auth::check();

$errors = [];
$item = new Category();


if (!empty($_POST)) {
    $pdo = Connection:: getPDO();
    $table = new CategoryTable($pdo);

    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name', 'slug',]);
    if ($v->validate()) {
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug(),
            
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
        exit();
    } else {
       $errors = $v->errors();  
    }
}
$form = new Form($item, $errors);
require_once ('../views/admin/category/new.php');

