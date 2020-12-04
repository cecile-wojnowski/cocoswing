<!DOCTYPE html>
<html>
  <head>
    <title>Qui sommes-nous</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

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


      <h1> Cours & stages </h1>

      <div id="scale" class="section scrollspy">
        <button type="button" name="button" class="scale-cours1 btn scale-transition scale-out"> Planning </button>
        <button type="button" name="button" class="scale-cours1 btn scale-transition scale-out"> Niveaux </button>
        <button type="button" name="button" class="scale-cours1 btn scale-transition scale-out"> Lieux </button>
        <button type="button" name="button" class="scale-cours1 btn scale-transition scale-out"> Tarifs </button>
      </div>
        <button type="button" name="button" class="btn z-depth-2" id="scale-cours-trigger1"> Cours réguliers </button>

        <div id="scale" class="section scrollspy">
          <button type="button" name="button" class="scale-cours2 btn scale-transition scale-out"> Planning </button>
          <button type="button" name="button" class="scale-cours2 btn scale-transition scale-out"> Niveaux </button>
          <button type="button" name="button" class="scale-cours2 btn scale-transition scale-out"> Lieux </button>
          <button type="button" name="button" class="scale-cours2 btn scale-transition scale-out"> Tarifs </button>
        </div>
          <button type="button" name="button" class="btn z-depth-2" id="scale-cours-trigger2"> Stages </button>

          <div id="scale" class="section scrollspy">
            <button type="button" name="button" class="scale-cours3 btn scale-transition scale-out"> Planning </button>
            <button type="button" name="button" class="scale-cours3 btn scale-transition scale-out"> Niveaux </button>
            <button type="button" name="button" class="scale-cours3 btn scale-transition scale-out"> Lieux </button>
            <button type="button" name="button" class="scale-cours3 btn scale-transition scale-out"> Tarifs </button>
          </div>
            <button type="button" name="button" class="btn z-depth-2" id="scale-cours-trigger3"> Cours particuliers </button>

  </div>
    </main>

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>


  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="js/animate.js" charset="utf-8"></script>
</html>
