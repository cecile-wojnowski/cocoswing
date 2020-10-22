<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
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
      <h1> Se connecter </h1>

      <form class="form_connexion" action="mon_compte.php" method="post">
        <div class="label_input">
          <label for="mail">Adresse e-mail </label>
          <input type="text" name="mail" id="mail" required>
        </div>

        <div class="label_input">
          <label for="password">Password</label>
          <input type="password" id="pass" name="password" minlength="8" required>
        </div>

        <div class="label_input">
          <label for="confirm_password">Confirmation du mot de passe </label>
          <input type="password" id="confirm_password" name="confirm_password" minlength="8" required>
        </div>

        <button type="button" name="form_inscription"> Connexion </button>
      </form>
    </main>
  </body>
</html>
