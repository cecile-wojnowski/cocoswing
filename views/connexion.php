<?php include('includes/bdd.php');
include('classes/Utilisateur.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <?php include('includes/liens_css.php'); ?>
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <div class="img_header">
      <section class="img_index"></section>
    </div>

    <main>
      <h1 class="h1_form"> Se connecter </h1>

      <?php
      if(isset($_POST['email'])){
        $utilisateur = new Utilisateur($bdd);
        $utilisateur->seConnecter($_POST['email'], $_POST['password']);
      }
       ?>

      <form class="form_connexion" action="connexion.php" method="post">
        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="email" name="email" id="email" placeholder="Saisir son adresse e-mail" required>
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="Saisir son mot de passe" required>
        </div>

        <div class="center">
          <button type="submit" class="button_pages"> Connexion </button>
          <p class="p_inscription">
            Nouveau ? <a class="link_inscription" href="inscription.php">Cliquez ici</a> pour vous inscrire.
          </p>
        </div>
      </form>
    </main>

    <?php include('includes/footer.php'); ?>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/script.js" charset="utf-8"></script>
</html>
