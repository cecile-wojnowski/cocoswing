<?php include('profil_nav.php'); ?>

<div class="container">


<?php if(isset($helloAsso)){ ?>
<p class="center-align"> <a href="<?php echo $helloAsso; ?>">Cliquez ici pour adhérer (formulaire HelloAsso) </a><p>
<?php }else{ ?>

<h2 class="center-align h2_compte">Choix de cours annuels</h2>


  <form action="adhesion" class="form_document" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col s4 m4">
        <p class="center-align p_cours">Choisir un cours</p>
        <p>
          <label>
            <input name="type_dance" value="1solo" type="radio" />
            <span>1 cours de Solo</span>
          </label>
        </p>
        <p>
          <label>
            <input name="type_dance" value="1lindy" type="radio" />
            <span>1 cours de Lindy Hop</span>
          </label>
        </p>
        <p class="center-align p_cours">Autres choix</p>
        <p>
          <label>
            <input name="type_dance" value="1lindy_1solo" type="radio"  />
            <span> 1 cours de Lindy + 1 cours de Solo</span>
          </label>
        </p>
        <p>
          <label>
            <input name="type_dance" value="2lindy" type="radio"  />
            <span> 2 cours de Lindy</span>
          </label>
        </p>
        <p>
          <label>
            <input name="type_dance" type="radio" disabled="disabled" />
            <span> 2 cours de Lindy + 1 cours de solo (disponible bientôt)</span>
          </label>
        </p>
      </div>

      <div class="col s4 m4">
        <p class="center-align p_cours">Réductions</p>
        <p>
          <label>
            <input name="lower_price" value="0" type="radio" checked />
            <span> Sans réduction </span>
          </label>
        </p>
        <p>
          <label>
            <input name="lower_price" value="1" type="radio"  />
            <span> Tarif étudiant </span>
          </label>
        </p>
        <p>
          <label>
            <input name="lower_price" value="1" type="radio"  />
            <span> Bénéficiaire du RSA</span>
          </label>
        </p>
        <input type="file" id="justificatif" name="justificatif" accept="image/png, image/jpeg">
        <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
      </div>

      <div class="col s4 m4">
        <p class="center-align p_cours">Payer en plusieurs fois</p>
        <p>
          <label>
            <input name="installment_payment" value="0" type="radio"  />
            <span> En 1x </span>
          </label>
        </p>
        <p>
          <label>
            <input name="installment_payment" value="1" type="radio"  />
            <span> En 3x sans frais </span>
          </label>
        </p>
      </div>
    </div>
    <div class="row">
      <button type="submit" name="button">Adhérer</button>
    </div>
  </form>


<?php } ?>


  <a href="#modal_justificatif" class="modal-trigger" rel="modal:open"> Nous transmettre un ustificatif </a>

<div id="modal_justificatif" class="modal">
  <h1> Demande de justificatif </h1>
  <div class="flex-row p-10">
    <div class="Add_doc_adhesion">
      <i class="far fa-file-alt"></i><br>
      <form class="form_document" method="post" enctype="multipart/form-data">
      
        <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
        <button type="submit" name="button">Envoyer le fichier</button>
      </form>
    </div>

    <p class="p_modal">Pour bénéficier d'un tarif réduit, veuillez nous transmettre les justificatifs adéquats. <br>
      Votre inscription ne sera valide qu'après leur vérification.
    </p>
  </div>
</div>
</div>
