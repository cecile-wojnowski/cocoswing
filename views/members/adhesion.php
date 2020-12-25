<?php include('profil_nav.php'); ?>

<h2 class="h2_compte">Choix de cours annuels</h2>
<div class="row">

  <form action="#" method="post" class="center-align">
    <p class="center-align p_cours">Choisir un cours</p>
    <p>
      <label>
        <input name="group1" value="1solo" type="radio" checked />
        <span>1 cours de Solo</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" value="1lindy" type="radio" />
        <span>1 cours de Lindy Hop</span>
      </label>
    </p>
    <p class="center-align p_cours">Autres choix</p>
    <p>
      <label>
        <input name="group1" value="1lindy_1solo" type="radio"  />
        <span> 1 cours de Lindy + 1 cours de Solo</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" value="2lindy" type="radio"  />
        <span> 2 cours de Lindy</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" disabled="disabled" />
        <span> 2 cours de Lindy + 1 cours de solo (disponible bientôt)</span>
      </label>
    </p>

    <p class="center-align p_cours">Réductions</p>
    <p>
      <label>
        <input name="group2" value="etudiant" type="radio"  />
        <span> Tarif étudiant </span>
      </label>
    </p>
    <p>
      <label>
        <input name="group2" value="rsa" type="radio"  />
        <span> Bénéficiaire du RSA</span>
      </label>
    </p>

    <p class="center-align p_cours">Etes-vous adhérent ?</p>
    <p>
      <label>
        <input name="group3" value="etudiant" type="radio"  />
        <span> Oui </span>
      </label>
    </p>
    <p>
      <label>
        <input name="group3" value="rsa" type="radio"  />
        <span> Non </span>
      </label>
    </p>

    <p class="center-align p_cours">Payer en plusieurs fois</p>
    <p>
      <label>
        <input name="group3" value="1x" type="radio"  />
        <span> En 1x </span>
      </label>
    </p>
    <p>
      <label>
        <input name="group3" value="3x" type="radio"  />
        <span> En 3x sans frais </span>
      </label>
    </p>

    <button type="button" name="" class="button_pages" id="btn_adhesion">
      <a href="#modal_justificatif" rel="modal:open"> Adhérer </a>
    </button>

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
