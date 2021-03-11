<!DOCTYPE html>
<html>
  <head>
    <title> Cocoswing | <?= $titlePage ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="<?= URL ?>ressources/img/logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/animation.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/footer.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/forms.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/header.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/main.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/mon_profil.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/normalize.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/table.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/classes_css.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>

  <body>
    <header>
      <nav class="nav_header">
        <ul>
          <li><a href="<?= URL ?>website"><i class="material-icons">home</i> </a></li>
          <li><a href="<?= URL ?>website/quiSommesNous"> Les cocos </a></li>
          <li><a href="<?= URL ?>website/cours"> Cours & stages </a></li>
          <li><a href="<?= URL ?>website/events"> Evènements </a></li>
          <li><a href="<?= URL ?>website/prestations"> Prestations </a></li>
          <?php
           if(isset($_SESSION['id'])){

             if($_SESSION['admin'] == 1){?>
             <li><a href="<?= URL ?>administration/listeCours"> Admin </a></li>
             <li><a href="<?= URL ?>members/deconnexion"><i class="material-icons">power_settings_new</i></a></li>
             <?php
            }else{ ?>
             <li><a href="<?= URL ?>members/monProfil"> Mon profil </a></li>
             <li><a href="<?= URL ?>members/deconnexion"><i class="material-icons">power_settings_new</i></a></li>
             <?php
            }
          }else{ ?>
            <li><a href="<?= URL ?>members/connexion"> Mon compte </a></li>
          <?php } ?>
        </ul>
      </nav>
      <section class="img_header"></section>
    </header>


    <main>
      <h1 class="center-align font-size-30"> <?php if(isset($title)){ echo $title; }?> </h1>

      <?= $content ?>
    </main>

    <footer>
      <h2 class="font-size-20">COCO SWING MARSEILLE</h2>

      <div class="container_footer">
        <ul class="ul_contact">
          <li class="font-size-18"><a href="<?= URL ?>website/contact"> Contact </li>
          <li class="font-size-18"><a href="<?= URL ?>members/connexion"> Adhésion </a></li>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= URL ?>ressources/js/animate.js" charset="utf-8"></script>
  <script src="<?= URL ?>ressources/js/script.js" charset="utf-8"></script>
</html>
