<!DOCTYPE html>
<html>
  <head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <?php include('ressources/includes/liens_css.php'); ?>
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
      <section class="img_index"></section>
    </header>


    <main id="main_index">
      <section class="content_index">
        <h1 class="h1_index">
          T'as le Groove Coco. Coco t'as le Groove !
        </h1>

        <p class="text">
          Bienvenue dans la fabrique à Swing des Cocos. <br>
          Ici tu trouveras des cours de Lindy Hop et de Charleston. <br>
          Tu découvriras un monde de fête, de joies et de copineries. <br>
        </p>

        <button type="button" name="button_inscription" class="button_index"> Inscriptions </button>

        <section class="actu_fb">
          <img id="actu_fb" src="ressources/img/event_temporary" alt="need_to_be_replaced">
        </section>

        <button type="button" name="button_inscription" class="button_index"> Newsletter </button>

      </section>

      <section class="list_buttons_index">
        <button type="button" name="button_pages" class="button_pages"> Cours </button>
        <button type="button" name="button_pages" class="button_pages"> Evènements </button>
        <button type="button" name="button_pages" class="button_pages"> Animations </button>
      </section>
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
