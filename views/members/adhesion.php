<?php include('profil_nav.php'); ?>

<div class="container">


<?php if(isset($helloAsso)){ ?>
  <h2 class="center-align font-size-25">Votre formulaire de paiement Hello Asso</h2>
  <div class="row">
    <div class="col m6 s6 offset-m3 m-top-5">
      <div class="card-panel background-blue">
        <p class="white-text">Pour devenir membre de l'association, deux étapes à suivre : <br>
        1) Remplir le formulaire Hello Asso correspondant à votre demande pour procéder au paiement; <br>
        2) Cliquer sur "Mettre à jour" pour devenir membre après réglement de votre achat.</p>

        <p class="center-align font-size-18 section">
          <a id="helloassolink" target="_blank" href="<?php echo $helloAsso; ?>">
            <button class="btn-large z-depth-1 background-orange text_red bold font-size">
              Paiement sur Hello Asso
            </button>
          </a>
        </p>
        <input type="hidden" id="formSlug" value="<?= $formSlug ?>">
      </div>
    </div>
  </div>
  <div class="center">
    <button class="btn-large z-depth-1 background-blue white-text font-size-18" id="verifier_paiement">
      Mettre à jour votre statut
    </button>
  </div>
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
          <p class="bold center-align p_cours font-size-18">Réductions*</p>
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
  <p class="center-align black-text">* Pour bénéficier d'un tarif réduit, veuillez nous transmettre les justificatifs adéquats. <br>
    Votre inscription ne sera valide qu'après leur vérification.
  </p>
  <div class="center">
    <button type="submit" class="btn-large background-blue font-size-18" name="button">Adhérer</button>
  </div>
  </form>

  <?php } ?>
</div>
