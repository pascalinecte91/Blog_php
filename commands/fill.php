<?php

use App\Connection;

require dirname(__DIR__) .  '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

$pdo = Connection::getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE comment');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$posts = [];
$comments = [];



for ($i = 0; $i < 55; $i++) {
    $pdo->exec("INSERT INTO post SET name='{$faker->sentence()}', slug='{$faker->slug}', author='{$faker->name}', chapo='{$faker->sentence(17)}', created_at='{$faker->date} {$faker->time}', content='{$faker->paragraphs(rand(3, 10), true)}'");
    $post = $pdo->lastInsertId();




    for ($j = 0; $j < 3; $j++) {
        $pdo->exec("INSERT INTO comment SET created_at='{$faker->date} {$faker->time}', author='{$faker->lastName}', content='{$faker->paragraph(rand(2, 7), true)}', post_id='{$post}'");
        $comments[] = $pdo->lastInsertId();
    }
}

foreach ($posts as $post) {
}

$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username='admin', password='$password'");

$password = password_hash('', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user_membre SET username= '', password='$password'");
