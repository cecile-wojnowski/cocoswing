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
      <h1 class="h1_form"> Mon compte </h1>

      <nav>
        <ul class="liste_compte">
          <li><a class="a_compte" href="mon_compte.php"> Mes informations </a></li>
          <li><a class="a_compte" href="mon_compte.php"> S'inscrire à un cours </a></li>
          <li><a class="a_compte" href="mon_compte.php"> Mes demandes en attente </a></li>
          <li><a class="a_compte" href="mon_compte.php"> Mes paiements </a></li>
        </ul>
      </nav>

      <section class="elements_compte">
        <div class="">
          <img src="img/user_picture" alt="Photo" class="user_picture">
          <a class="a_compte" href=""> Ajouter une photo/mettre à jour </a>
        </div>

        <div class="">

          <a class="a_compte" href=""> Choisir vos cours annuels </a>
        </div>

        <div class="">
          <a class="a_compte" href=""> Ajouter un document </a>
          <p>Justificatif étudiant/RSA/Pôle Emploi</p>
        </div>

      </section>

      <h2 class="h2_compte">Mes informations</h2>

      <form class="form_connexion" action="mon_compte.php" method="post">

        <div class="label_input">
          <label for="mail">Adresse e-mail </label>
          <input type="text" name="mail" id="mail" placeholder="Saisir son adresse e-mail" required>
        </div>

        <div class="label_input">
          <label for="name"> Prénom </label>
          <input type="text" name="name" id="name" placeholder="Saisir son prénom" required>
        </div>

        <div class="label_input">
          <label for="family_name"> Nom </label>
          <input type="text" name="family_name" id="family_name" placeholder="Saisir son nom" required>
        </div>

        <div class="label_input">
          <label for="tel"> N° de téléphone </label>
          <input type="tel" name="phone" id="phone" placeholder="Saisir son numéro de téléphone">
        </div>

        <div class="label_input">
          <label for="family_name"> Pseudo Facebook* </label>
          <input type="text" name="facebook" id="facebook" placeholder="Saisir son pseudo Facebook">
        </div>

        <div class="label_input">
          <label for="password">Mot de passe (8 caractères minimum)</label>
          <input type="password" id="password" name="password" minlength="8"
          placeholder="Saisir son mot de passe" required>
        </div>

        <div class="label_input">
          <label for="confirm_password">Confirmation du mot de passe </label>
          <input type="password" id="confirm_password" name="confirm_password" minlength="8"
          placeholder="Confirmer son mot de passe" required>
        </div>

        <button type="button" name="form_inscription" class="button_pages"> Mettre à jour </button>
      </form>

    </main>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
