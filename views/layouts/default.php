      <!DOCTYPE html>
      <html lang="fr" class="h-100">

      <head>
        <script src="https://cdn.tiny.cloud/1/vulic088otkcbtpjur7cqapj7bi254hb6tyeq1jl3e8upz16/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="  bjr ceci est blog ">
        <title><?= isset($title) ? e($title) : 'mon Blog' ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/clean-blog.css">
        <link rel="stylesheet" href="/style.css">


      </head>

      <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
          <div class="container">
            <div class="collapse navbar-collapse " id="navbarResponsive">
              <ul class="navbar-nav ml-auto justify-content-between ">
                <li class="nav-item">
                  <a class="nav-link" href="<?= $router->url('home') ?>">ACCUEIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= $router->url('blog') ?>">BLOG</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" data-toggle="tooltip" href="/login_member">Membres</a></span>
                </li>
                <li class="nav-item">
                   <a class="nav-link" data-toggle="tooltip" href="/login_register">INSCRIPTION</a></span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Page Header -->
        <header class="masthead" style="background-image: url('/contact-bg.jpg')">
          <div class="overlay"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                  <h1>Contactez-moi</h1>

                  <img src="/photo.png " alt="photo">
                  <br>

                  <h3> Pascale CHRISTOPHE <h3>

                      <span class=<h3>Un projet ? Faisons le ENSEMBLE</h3</span>
                        <a href="/cvProjet5.pdf" style="color: green"><br>Mon CV</a>
                </div>
              </div>
            </div>
          </div>
        </header>
        <div class="container ">
          <?= $content ?>
          </div>

        <footer class="bg-dark text-white py-4  mt-auto">
          <div class="d-flex justify-content-around">
            <a href="https://fr.facebook.com" style="color: #02b5fc"><i class="fa fa-facebook fa-2x"></i> Facebook</a>
            <a href="https://twitter.com/explore" style="color: red"><i class="fa fa-twitter fa-2x"></i> Twitter </a>
            <a href="/cvProjet5.pdf" style="color: white">Telecharger mon CV</a>
            <a href="https://github.com" style="color: #02b5fc"><i class="fa fa-github fa-2x"></i> Github</a>
            <a href="https://fr.linkedin.com/" style="color: #f7f10a"><i class="fa fa-linkedin fa-2x"></i> Linkedin</a>

          </div>
          <div class="col-12 text-center">
            <a href="/login_admin" style="color: white">CONNEXION ADMINISTRATION </a>
            <p class="copyright text-muted">Copyright &copy; Pascaline 2020</p>
            </div>

        </footer>

        <!-- Custom scripts for this template -->
        <script src="/js/tinymce.js"></script>
        <script src="/js/defilment.js"></script>
        <script src="/js/alert.js"></script>
      

      </body>
      </html>
