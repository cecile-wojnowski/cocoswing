<!DOCTYPE html>
<html>
  <head>
    <title><?= $page_title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../ressources/css/adhesion.css">
    <link rel="stylesheet" href="../ressources/css/animation.css">
    <link rel="stylesheet" href="../ressources/css/footer.css">
    <link rel="stylesheet" href="../ressources/css/form_connexion.css">
    <link rel="stylesheet" href="../ressources/css/header.css">
    <link rel="stylesheet" href="../ressources/css/index.css">
    <link rel="stylesheet" href="../ressources/css/main.css">
    <link rel="stylesheet" href="../ressources/css/mon_profil.css">
    <link rel="stylesheet" href="../ressources/css/normalize.css">
    <link rel="stylesheet" href="../ressources/css/presentation.css">
    <link rel="stylesheet" href="../ressources/css/table.css">
    <link rel="stylesheet" href="../ressources/css/classes_css.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>

  <body>
    <header>
      <nav class="nav_header">
        <ul>
          <li><a href="index.php"> <i class="fas fa-home"></i> </a></li>
          <li><a href="presentation.php"> Les cocos </a></li>
          <li><a href="cours.php"> Cours & stages </a></li>
          <li><a href="evenements.php"> Evènements </a></li>
          <li><a href="prestations.php"> Prestations </a></li>
          <li><a href="#"> Culture Swing </a></li>
          <li><a href="connexion.php"> Mon compte </a></li>
        </ul>
      </nav>
      <section class="img_header"></section>
    </header>


    <main>
      <?= $title ?>

      <?= $content ?>
    </main>

    <footer>
      <h2>COCO SWING MARSEILLE</h2>

      <div class="container_footer">
        <ul class="ul_contact">
          <li> Contact </li>
          <li> Adhésion </li>
        </ul>

        <ul>
          <li>Retrouvez-nous</li>
          <li>
            <a href="https://www.facebook.com/cocoswingmarseille/"> <i class="fab fa-facebook-square"></i> </a>
            <a href="https://www.instagram.com/cocoswingmarseille/?hl=fr"><i class="fab fa-instagram-square"></i></a>
            <a href="https://www.youtube.com/channel/UCHqvVbW2ysBThOmSpdZIfyQ"><i class="fab fa-youtube-square"></i></a>
          </li>
        </ul>
      </div>
    </footer>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/animate.js" charset="utf-8"></script>
</html>
