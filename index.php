<!DOCTYPE html>
<html>
  <head>
    <title>Page d'accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <section class="img_index"></section>
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
          <img id="actu_fb" src="img/event_temporary" alt="need_to_be_replaced">
        </section>

        <button type="button" name="button_inscription" class="button_index"> Newsletter </button>

      </section>

      <section class="list_buttons_index">
        <button type="button" name="button_pages" class="button_pages"> Cours </button>
        <button type="button" name="button_pages" class="button_pages"> Evènements </button>
        <button type="button" name="button_pages" class="button_pages"> Animations </button>
      </section>
    </main>

      <?php include("includes/footer.php"); ?>
  </body>
</html>
