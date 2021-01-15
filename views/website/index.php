<!DOCTYPE html>
<html>
  <head>
    <title>Cocoswing | Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= URL ?>ressources/css/adhesion.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/animation.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/footer.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/header.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/index.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/main.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/mon_profil.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/normalize.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/presentation.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/table.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/classes_css.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <li><a href="#"> <i class="fas fa-home"></i> </a></li>
          <li><a href="website/quiSommesNous"> Les cocos </a></li>
          <li><a href="website/cours"> Cours & stages </a></li>
          <li><a href="website/events"> Evènements </a></li>
          <li><a href="website/prestations"> Prestations </a></li>
          <li><a href="members/connexion"> Mon compte </a></li>
        </ul>
      </nav>
      <section id="cover_header_index"></section>
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
