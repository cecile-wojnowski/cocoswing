<?php include('profil_nav.php'); ?>

<div class="container">


<?php if(isset($helloAsso)){ ?>
<p class="center-align"> <a target="_blank" href="<?php echo $helloAsso; ?>">Cliquez ici pour adhérer (formulaire HelloAsso) </a><p>
  <p>
    <input type="hidden" id="formSlug" value="<?= $formSlug ?>">
    <button id="verifier_paiement">Vérifier le paiement</button>
  </p>
<?php }else{ ?>

<h2 class="center-align h2_compte">Choix de cours annuels</h2>
  <form class="white-text" action="adhesion" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col s5 m5 offset-m1">
        <div class="card-panel background-orange">
          <p class="bold center-align p_cours font-size-18">Choisir un cours</p>
          <p>
            <label>
              <input name="type_dance" value="1solo" type="radio" checked />
              <span class="white-text">1 cours de Solo</span>
            </label>
          </p>
          <p>
            <label>
              <input name="type_dance" value="1lindy" type="radio" />
              <span class="white-text">1 cours de Lindy Hop</span>
            </label>
          </p>
          <p class="center-align p_cours">Autres choix</p>
          <p>
            <label>
              <input name="type_dance" value="1lindy_1solo" type="radio"  />
              <span class="white-text"> 1 cours de Lindy + 1 cours de Solo</span>
            </label>
          </p>
          <p>
            <label>
              <input name="type_dance" value="2lindy" type="radio"  />
              <span class="white-text"> 2 cours de Lindy</span>
            </label>
          </p>
          <p>
            <label>
              <input name="type_dance" type="radio" disabled="disabled" />
              <span class="white-text"> 2 cours de Lindy + 1 cours de solo (disponible bientôt)</span>
            </label>
          </p>
        </div>
      </div>

      <div class="col s5 m5">
        <div id="card-panel-reductions" class="card-panel background-orange">
          <p class="bold center-align p_cours font-size-18">Réductions</p>
          <p>
            <label>
              <input name="lower_price" value="0" type="radio" checked />
              <span class="white-text"> Sans réduction </span>
            </label>
          </p>
          <p>
            <label>
              <input name="lower_price" value="1" type="radio"  />
              <span class="white-text"> Tarif étudiant </span>
            </label>
          </p>
          <p>
            <label>
              <input name="lower_price" value="1" type="radio"  />
              <span class="white-text"> Bénéficiaire du RSA</span>
            </label>
          </p>
          <input type="file" id="justificatif" name="justificatif" accept="image/png, image/jpeg">
          <p class="p_justificatif">Justificatif étudiant/RSA/Pôle Emploi</p>
        </div>
      </div>
  </div>
  <div class="row">


      <div class="col s10 m10 offset-m1">
        <div class="card-panel background-orange">
          <p class="bold center-align p_cours font-size-18">Payer en plusieurs fois</p>
          <p class="center-align">
            <label>
              <input name="installment_payment" value="0" type="radio" checked />
              <span class="white-text"> En 1x </span>
            </label>
          </p>
          <p class="center-align">
            <label>
              <input name="installment_payment" value="1" type="radio"  />
              <span class="white-text"> En 3x sans frais </span>
            </label>
          </p>
        </div>
      </div>
  </div>

    <div class="center">
      <button type="submit" class="btn-large background-blue font-size-18" name="button">Adhérer</button>
    </div>
  </form>

<?php } ?>
  <p class="p_modal">Pour bénéficier d'un tarif réduit, veuillez nous transmettre les justificatifs adéquats. <br>
    Votre inscription ne sera valide qu'après leur vérification.
  </p>
</div>
