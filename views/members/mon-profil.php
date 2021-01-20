<?php
//var_dump($infosUser);
?>
<?php include('profil_nav.php'); ?>

<h2 class="h2_compte">Mes informations</h2>

<section class="elements_compte">
  <div class="col">
    <img src="../ressources/img/<?= $infosUser['_picture'] ?>" alt="Photo" class="user_picture">
    <a class="a_compte" href=""> Ajouter une photo/mettre à jour </a>
  </div>

  <div class="col">
    <i class="fas fa-cart-plus"></i><br>
    <a class="a_compte" href="<?= URL ?>members/adhesion"> Choisir vos cours annuels </a>
  </div>

  <div class="col">
    <i class="far fa-file-alt"></i><br>
    <input type="file" id="justificatif" name="justificatif" accept="image/png, image/jpeg">
    <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
  </div>
</section>

<form class="form_connexion" action="updateProfile" method="post">

  <div class="label_input">
    <label for="mail">Adresse e-mail </label>
    <input type="text" name="email" id="email" value="<?= $infosUser['_email'] ?>" placeholder="Saisir son adresse e-mail" required>
  </div>

  <div class="label_input">
    <label for="name"> Prénom </label>
    <input type="text" name="first_name" id="first_name" value="<?= $infosUser['_firstName'] ?>" placeholder="Saisir son prénom" required>
  </div>

  <div class="label_input">
    <label for="family_name"> Nom </label>
    <input type="text" name="family_name" id="family_name" value="<?= $infosUser['_familyName'] ?>"placeholder="Saisir son nom" required>
  </div>

  <div class="label_input">
    <label for="tel"> N° de téléphone </label>
    <input type="tel" name="phone" id="phone" value="<?= $infosUser['_phone'] ?>" placeholder="Saisir son numéro de téléphone">
  </div>

  <div class="label_input">
    <label for="pseudo_facebook"> Pseudo Facebook* </label>
    <input type="text" name="pseudo_facebook" id="pseudo_facebook" value="<?= $infosUser['_pseudoFacebook'] ?>" placeholder="Saisir son pseudo Facebook">
  </div>

  <div class="label_input">
    <label for="password">Mot de passe (8 caractères minimum)</label>
    <input type="password" id="password" name="password"
    placeholder="Saisir son mot de passe" required>
  </div>

  <div class="label_input">
    <label for="confirm_password">Confirmation du mot de passe </label>
    <input type="password" id="confirm_password" name="confirm_password"
    placeholder="Confirmer son mot de passe" required>
  </div>

  <button type="submit" name="submit" class="button_pages"> Mettre à jour </button>
</form>
