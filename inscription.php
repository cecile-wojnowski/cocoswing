<?php include('includes/bdd.php');
include('classes/Utilisateur.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

    <?php include('includes/liens_css.php'); ?>
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <div class="img_header">
      <section class="img_index"></section>
    </div>

    <main>
      <h1 class="h1_form"> S'inscrire </h1>

      <div class="erreur hidden">
      </div>

      <form class="form_connexion" action="inscription.php" method="post">

        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="text" name="email" id="email" placeholder="Saisir son adresse e-mail">
        </div>

        <div class="label_input">
          <label for="prenom"> Prénom </label>
          <input type="text" name="prenom" id="prenom" placeholder="Saisir son prénom">
        </div>

        <div class="label_input">
          <label for="nom"> Nom </label>
          <input type="text" name="nom" id="nom" placeholder="Saisir son nom">
        </div>

        <div class="label_input">
          <label for="telephone"> N° de téléphone </label>
          <input type="tel" name="telephone" id="telephone" placeholder="Saisir son numéro de téléphone">
        </div>

        <div class="label_input">
          <label for="facebook"> Pseudo Facebook* </label>
          <input type="text" name="facebook" id="facebook" placeholder="Saisir son pseudo Facebook">
        </div>

        <div class="label_input">
          <label for="password">Mot de passe (8 caractères minimum)</label>
          <input type="password" id="password" name="password"
          placeholder="Saisir son mot de passe">
        </div>

        <div class="label_input">
          <label for="confirm_password">Confirmation du mot de passe </label>
          <input type="password" id="confirm_password" name="confirm_password"
          placeholder="Confirmer son mot de passe">
        </div>

        <button type="submit" class="button_pages" name="submit"> Inscription </button>

        <p class="p_facultatif">
          * Champ facultatif. <br>
          Cela nous permettrait de te retrouver et de t'inviter dans les groupes liés aux activités de l'association.
        </p>
      </form>
    </main>

    <?php include('includes/footer.php'); ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/script.js" charset="utf-8"></script>
</html>
