<?php include('includes/bdd.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/form_connexion.css">
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
      <h1 class="h1_form"> Se connecter </h1>

      <form class="form_connexion" action="mon_compte.php" method="post">
        <div class="label_input">
          <label for="mail">Adresse e-mail </label>
          <input type="text" name="mail" id="mail" placeholder="Saisir son adresse e-mail" required>
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="pass" name="password" minlength="8" placeholder="Saisir son mot de passe" required>
        </div>

        <div class="label_input">
          <label for="confirm_password">Confirmation du mot de passe </label>
          <input type="password" id="confirm_password" name="confirm_password" minlength="8"
          placeholder="Confirmer son mot de passe"required>
        </div>

        <div class="center">


        <button type="button" name="form_inscription" class="button_pages"> Connexion </button>

        <p class="p_inscription">
          Nouveau ? <a class="link_inscription" href="inscription.php">Cliquez ici</a> pour vous inscrire.
        </p>
      </div>
      </form>

    </main>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
