<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/mon_profil.css">
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
      <h1 class="h1_margin_bottom"> Mon compte </h1>

      <nav>
        <ul class="liste_compte">
          <li><a class="a_compte" href="mon_profil.php"> Mes informations </a></li>
          <li><a class="a_compte" href="adhesion.php"> S'inscrire à un cours </a></li>
          <li><a class="a_compte" href="planning.php"> Voir le planning </a></li>
          <li><a class="a_compte" href="mes_cours.php"> Mes demandes en attente </a></li>
          <li><a class="a_compte" href="historique_paiements.php"> Mes paiements </a></li>
        </ul>
      </nav>

    </main>
  </body>
</html>
