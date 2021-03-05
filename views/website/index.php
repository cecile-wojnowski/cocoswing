<?php //var_dump($events); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cocoswing | Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= URL ?>ressources/img/logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= URL ?>ressources/css/animation.css">
    <link rel="stylesheet" href="<?= URL ?>ressources/css/footer.css">
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
      <nav>
        <ul>
          <li><a href="#"> <i class="material-icons">home</i> </a></li>
          <li><a href="<?= URL ?>website/quiSommesNous"> Les cocos </a></li>
          <li><a href="<?= URL ?>website/cours"> Cours & stages </a></li>
          <li><a href="<?= URL ?>website/events"> Evènements </a></li>
          <li><a href="<?= URL ?>website/prestations"> Prestations </a></li>
          <?php if(!isset($_SESSION['id'])){ ?>
            <li><a href="<?= URL ?>members/connexion"> Mon compte </a></li>
          <?php }else{ ?>
            <li><a href="<?= URL ?>members/monProfil"> Mon profil </a></li>
            <li><a href="<?= URL ?>members/deconnexion"><i class="material-icons">power_settings_new</i></a></li>
          <?php } ?>
        </ul>
      </nav>
      <section id="cover_header_index"></section>
    </header>


    <main id="main_index">
      <div class="container">
        <h1 class="h1_index font-size-30 center-align">T'as le Groove Coco. Coco t'as le Groove !</h1>

        <p class="center-align font-size-20">
          Bienvenue dans la fabrique à Swing des Cocos. <br>
          Ici tu trouveras des cours de Lindy Hop et de Charleston. <br>
          Tu découvriras un monde de fête, de joies et de copineries. <br>
        </p>

        <div class="center">
          <a href="<?= URL ?>members/inscription">
            <button class="text_red waves-light waves-effect background-orange z-depth-1 bold font-size-18"> Je m'inscris </button>
          </a>
        </div>


        <section class="actu_fb">
          <h2>Nos derniers événements</h2>
          <table>
            <thead>
              <th>Date</th>
              <th>Evénement</th>
              <th>Lieu</th>
            </thead>

            <tbody>
              <?php
              for($i = 0; $i < 5 ; $i++) { ?>
                <tr>
                  <td>
                    <?php
                    if(!empty($events[$i]['start_time'])){
                      echo $events[$i]['start_time'] . '<br>';
                    }
                    if(!empty($events[$i]['end_time'])){
                      echo $events[$i]['end_time'];
                    }
                     ?>
                  </td>
                  <td><?= $events[$i]['name'] ?></td>
                  <td><?= $events[$i]['place']['name'] ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </section>

        <div class="center">
          <button class="text_red waves-light waves-effect background-orange z-depth-1 bold font-size-18"> Newsletter </button>
        </div>



      <div class="row section">
        <div class="col s9 m9 offset-m3">
          <a href="<?= URL ?>website/cours">
            <button class="background-blue waves-light waves-effect z-depth-1 bold font-size-18"> Cours </button>
          </a>
          <a href="<?= URL ?>website/events">
            <button class="background-blue waves-light waves-effect z-depth-1 bold font-size-18"> Evènements </button>
          </a>
          <a href="<?= URL ?>website/prestations">
            <button class="background-blue waves-light waves-effect z-depth-1 bold font-size-18"> Prestations </button>
          </a>
        </div>
      </div>
    </div>
    </main>

    <footer id="footer_index">
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= URL ?>ressources/js/animate.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
