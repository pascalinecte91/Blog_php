<?php
use App \Connection;
use App \Table\PostTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;
use App\Table\CategoryTable;


Auth::check();

$pdo = Connection:: getPDO();
$postTable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post = $postTable ->find($params['id']);
$categoryTable->hydratePosts([$post]);
$success = false;

$errors = [];

if (!empty($_POST)) {
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);
    if ($v->validate()) {
        $pdo->beginTransaction();
        $pdo->commit();
        $categoryTable->hydratePosts([$post]);
        $success = true;
    } else {
       $errors = $v->errors();  
    }
}
$form = new Form($post, $errors);
?>

<?php if (isset($_GET['created'])): ?>
<div class="alert alert-success">
Le commentaire a ete correctement crée
</div>
<?php endif ?>

<h1>Editer le commentaire <?= e($post->getName()) ?></h1>

<?php require('_form.php') ?>
