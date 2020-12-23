<?php include('profil_nav.php'); ?>

<h2 class="h2_compte">Choix de cours annuels</h2>
<div class="row">

  <form class="form_adhesion" method="post">
    <div class="col m8 s8 offset-m2">
      <p class="center-align" id="p_cours">Choisir un cours</p>

      <div class="blue_radio hidden">
          <input type="radio" id="once" name="once" value="once">
          <label for="once">1x par semaine</label>
        </div>

        <div class="orange_radio hidden">
          <input type="radio" id="twice" name="twice" value="twice">
          <label for="twice">2x par semaine</label>
        </div>

      <div class="blue_radio col m3 offset-m2">
          <input type="radio" id="solo" name="solo" value="solo">
          <label for="solo">Solo</label>
      </div>

      <div class="orange_radio col m3 offset-m2">
        <input type="radio" id="lindy" name="lindy" value="lindy">
        <label for="lindy">Lindy</label>
      </div>
    </div>

    <div class="col m8 s8 offset-m2">
      <div id="reductions_radio">
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

      <div id="adherent_radio">
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

      <div id="paiement_radio">
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

      <button type="button" name="form_inscription" class="button_pages" id="btn_adhesion">
        <a href="#modal_justificatif" rel="modal:open"> Adhérer </a>
      </button>
    </div>
  </form>
</div>

<div id="modal_justificatif" class="modal">
  <h1> Demande de justificatif </h1>
  <div class="modal_flex">
    <div class="Add_doc_adhesion">
      <i class="far fa-file-alt"></i><br>
      <a class="a_compte" href=""> Ajouter un document </a>
      <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
    </div>

    <p class="p_modal">Pour bénéficier d'un tarif réduit, veuillez nous transmettre les justificatifs adéquats. <br>
      Votre inscription ne sera valide qu'après leur vérification.
    </p>
  </div>
</div>
