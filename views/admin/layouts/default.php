<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
  <script src="https://cdn.tiny.cloud/1/vulic088otkcbtpjur7cqapj7bi254hb6tyeq1jl3e8upz16/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name', });</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,0 shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= isset($title) ? e($title) : 'mon Blog' ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/clean-blog.css">
  <link rel="stylesheet" href="/style.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="">Mon blog Projet 5</a>


      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->url('home') ?>">ACCUEIL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->url('blog') ?>">BLOG</a>
          </li>
      
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/dev-image.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h3><marquee scrollamount="4">Vous êtes connectés</marquee scrollamount="4"></h3>

            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container ">
    <?= $content ?>
  </div>

  <footer class="bg-dark text-white py-4 footer mt-auto">
    <div class="d-flex justify-content-around">
      <a href="https://fr.facebook.com" style="color: #02b5fc"><i class="fa fa-facebook fa-2x"></i> Facebook</a>
      <a href="https://twitter.com/explore" style="color: red"><i class="fa fa-twitter fa-2x"></i> Twitter </a>
      <a href="/cv_projet4.pdf" style="color: white">Telecharger mon CV</a>
      <a href="https://github.com" style="color: #02b5fc"><i class="fa fa-github fa-2x"></i> Github</a>
      <a href="https://fr.linkedin.com/" style="color: #f7f10a"><i class="fa fa-linkedin fa-2x"></i> Linkedin</a>

    </div>
    <div class="col-12 text-center">
      <a href="/login" style="color: white">CONNEXION ADMIN</a>
      <p class="copyright text-muted">Copyright &copy; Pascaline 2020</p>

    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.js"></script>
  <script src="/tinymce.js"></script>
</body>

</html>