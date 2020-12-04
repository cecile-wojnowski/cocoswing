<!DOCTYPE html>
<html>
  <head>
    <title>Qui sommes-nous</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Plugin JQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <?php include('includes/liens_css.php'); ?>
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <div class="img_header">
      <section class="img_index"></section>
    </div>
    <main>
    <div class="container">
      <p>Texte de présentation</p>
      <div class="row">
        <div class="col s8 m8">
          <h2>Galerie d'images</h2>
          <div class="carousel carousel-slider center">
            <a class="carousel-item" href="#one!"><img src="img/carousel1.jpg"></a>
            <a class="carousel-item" href="#two!"><img src="img/carousel2.jpg"></a>
            <a class="carousel-item" href="#three!"><img src="img/carousel3.jpg"></a>
            <a class="carousel-item" href="#four!"><img src="img/carousel4.jpg"></a>
            <a class="carousel-item" href="#five!"><img src="img/carousel5.jpg"></a>
          </div>
        </div>
      </div>

      <form class="" action="index.html" method="post">
        <p>Contactez-nous</p>
      </form>
    </div>
  </main>

    <?php include("includes/footer.php"); ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/animate.js" charset="utf-8"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
