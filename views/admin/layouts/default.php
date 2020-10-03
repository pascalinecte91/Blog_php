<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? e($title) : 'mon Blog' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href ="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css">   
</head>

<body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-lg navbar-dark justify-content-between ">
        <a href="#" class="navbar-brand">Projet 5 PHP </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= $router->url('admin_posts') ?>"  class="nav-link">Articles</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->url('admin_categories') ?>"  class="nav-link">categories</a>
            </li>
            <div class="col ">
            <li clas="nav-item">
    <form action="<?= $router->url('logout') ?>" method="post" style="display:inline">
        <button type="submit" class="nav-link" style="background:transparent; border: none;"> Se déconnecter</button>
        </li>
    </form>
       
    </div>
    </ul>
</nav>


    <div class="container ">
    <?= $content ?>
    </div>

    <footer class="bg-dark text-white py-4 footer mt-auto">
   
        <div class="d-flex justify-content-around">
            <a href="https://fr.facebook.com"><i class="fa fa-facebook fa-2x"></i> Facebook</a>
            <a href="https://twitter.com/explore"><i class="fa fa-twitter fa-2x"></i> Twitter </a>
            <a href="/mon_cv_projet_4" style="color:#cbb9cc">Telecharger mon CV</a>
            <a href="https://github.com"><i class="fa fa-github"></i> Github</a>
            <a href="https://fr.linkedin.com/"><i class="fa fa-linkedin"></i> Linkedin</a>
            
        </div>
    </footer>
</body>
</html>


    