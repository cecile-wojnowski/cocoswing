<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/mon_compte.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/presentation.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <div class="img_header">
      <section class="img_index"></section>
    </div>

    <main>
      <h1 class="h1_form"> Mon compte </h1>
      <h2 class="h2_compte">Choix de cours annuels</h2>

      <form class="form_adhesion" action="adhesion.php" method="post">

          <p id="p_cours">Choisir un cours</p>
          <p id="p_nombre_cours">Nombre de cours hebdomadaires</p>

        <div class="blue_radio" id="blue_radio1">
            <input type="radio" id="solo" name="solo" value="solo">
            <label for="solo">Solo</label>
        </div>
        <div class="blue_radio" id="blue_radio2">
            <input type="radio" id="once" name="once" value="once">
            <label for="once">1x par semaine</label>
          </div>

        <div class="orange_radio" id="orange_radio1">

            <input type="radio" id="lindy" name="lindy" value="lindy">
            <label for="lindy">Lindy</label>

          </div>
        <div class="orange_radio" id="orange_radio2">
          <input type="radio" id="twice" name="twice" value="twice">
          <label for="twice">2x par semaine</label>

        </div>


          <div id="reductions_radio">
            <p> Réductions </p>
            <span>
              <input type="radio" id="student_price" name="student_price" value="Tarif étudiant">
              <label for="student_price"> Tarif étudiant </label>
            </span>

            <span>
              <input type="radio" id="rsa" name="rsa" value="Bénéficiaire du RSA">
              <label for="rsa">Bénéficiaire du RSA</label>
            </span>
          </div>

          <div id="adherent_radio">
            <p>Êtes-vous adhérent ? </p>
            <span>
              <input type="radio" id="adherent_true" name="adherent_true" value="Oui">
              <label for="adherent_true">Oui</label>
            </span>
            <span>
              <input type="radio" id="adherent_false" name="adherent_false" value="Non">
              <label for="adherent_false">Non</label>
            </span>
          </div>

          <div id="paiement_radio">
            <p> Payer en plusieurs fois </p>
            <span>
              <input type="radio" id="paiement_unique" name="paiement_unique" value="1x">
              <label for="paiement_unique">En 1x</label>
            </span>
            <span>
              <input type="radio" id="triple_paiement" name="triple_paiement" value="3x">
              <label for="adherent_false">En 3x sans frais</label>
            </span>
          </div>


        <button type="button" name="form_inscription" class="button_pages" id="btn_adhesion"> Adhérer </button>
      </form>

    </main>
    <?php include("includes/footer.php"); ?>
  </body>
</html>
