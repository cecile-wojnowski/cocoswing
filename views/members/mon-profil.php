<?php
//var_dump($infosUser);
?>
<?php include('profil_nav.php'); ?>
<div class="container">
  <h2 class="center-align h2_compte">Mes informations</h2>

<div class="row">
  <div class="elements_compte">
    <div class="col s4 m4 offset-m1">
      <img src="../ressources/img/<?= $infosUser['_picture'] ?>" alt="Photo" class="user_picture circle">
      <a class="a_compte" id="picture_profile"> Ajouter une photo/mettre à jour </a>
    </div>

    <div class="col s4 m4">
      <?php if($_SESSION['member'] == 1){ ?>
       <i id="check_icon" class="material-icons">check</i>
      <p class="text_orange"> Adhésion active </p>
    <?php }else{ ?>
      <i class="medium material-icons">add_shopping_cart</i>
      <a class="a_compte" href="<?= URL ?>members/adhesion"> Choisir vos cours annuels </a>
    <?php } ?>
    </div>

    <div class="col s3 m3">
      <i class="medium material-icons">description</i>
      <a class="a_compte modal-trigger" href="#modal_justificatif" rel="modal:open"> Ajouter un document </a>
      <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
    </div>
  </div>
</div>

  <div id="modal_justificatif" class="modal">
    <h1 class="center-align"> Demande de justificatif </h1>
    <div class="flex-row p-10">
      <div class="Add_doc_adhesion">
        <i class="far fa-file-alt"></i><br>
        <form class="form_document" method="post" enctype="multipart/form-data">
          <input type="file" id="justificatif" name="justificatif" accept="image/png, image/jpeg">
          <p class="p_justificatif font-size-14">Justificatif étudiant/RSA/Pôle Emploi</p>
          <button type="submit" name="button">Envoyer le fichier</button>
        </form>
      </div>
      <p class="p_modal">Pour bénéficier d'un tarif réduit, veuillez nous transmettre les justificatifs adéquats. <br>
        Votre inscription ne sera valide qu'après leur vérification.
      </p>
    </div>
  </div>

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
</div>
