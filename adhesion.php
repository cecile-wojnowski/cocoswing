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
        <div class="textes_radio">
          <p id="p_cours">Choisir un cours</p>
          <p id="p_nombre_cours">Nombre de cours hebdomadaires</p>
        </div>
        <div class="blue_radio">
          <input type="radio" id="solo" name="solo" value="solo">
          <label for="solo">Solo</label>

          <input type="radio" id="once" name="once" value="once">
          <label for="once">1x par semaine</label>
        </div>

        <div class="orange_radio">
          <input type="radio" id="lindy" name="lindy" value="lindy">
          <label for="lindy">Lindy</label>

          <input type="radio" id="twice" name="twice" value="twice">
          <label for="twice">2x par semaine</label>
        </div>

        <section class="bottom_form_adhesion">
          <div>
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

          <div class="">
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

          <div class="">
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
        </section>

        <button type="button" name="form_inscription" class="button_pages"> Adhérer </button>
      </form>

    </main>
    <?php include("includes/footer.php"); ?>
  </body>
</html>
