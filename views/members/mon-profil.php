<h1 class="h1_margin_bottom"> Mon compte </h1>

<?php include('includes/profil_nav.php'); ?>

<h2 class="h2_compte">Mes informations</h2>

<section class="elements_compte">
  <div class="col">
    <img src="img/user_picture" alt="Photo" class="user_picture">
    <a class="a_compte" href=""> Ajouter une photo/mettre à jour </a>
  </div>

  <div class="col">
    <i class="fas fa-cart-plus"></i><br>
    <a class="a_compte" href="adhesion.php"> Choisir vos cours annuels </a>
  </div>

  <div class="col">
    <i class="far fa-file-alt"></i><br>
    <a class="a_compte" href=""> Ajouter un document </a>
    <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
  </div>
</section>

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
