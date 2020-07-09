<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? e($title) : 'Mon blog' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-brand">Bienvenue sur mon blog</a>
    </nav>

    <div class="container mt-4">
        <?= $content ?>
    </div>

    <footer class="bg-secondary text-white py-4 footer mt-auto">
    <div class="d-flex justify-content-center" >
        <h3>Me contacter</h3>
    </div>
        <div class="d-flex justify-content-around">
            <a class="btn btn-primary" href="https://fr.facebook.com"><i class="fa fa-facebook fa-2x"></i> Partager</a>
            <a class="btn btn-danger" href="https://twitter.com/explore"><i class="fa fa-twitter fa-2x"></i> Tweet</a>
            <a class="btn btn-info" href="https://github.com"><i class="fa fa-github"></i> Github</a>
            <a class="btn btn-warning" href="https://fr.linkedin.com/"><i class="fa fa-linkedin"></i> Linkedin</a>
            
        </div>
    </footer>
</body>
</html>