<?php include('admin_nav.php'); ?>

<?php //var_dump($solo); ?>
<?php //var_dump($lindy); ?>
<?php //var_dump($soloLindy); ?>
<div class="container">
  <h2 class="center-align h2_compte"> Formules </h2>
  <p class="center-align"><a href="#modal_formule" class="modal-trigger" rel="modal:open"> Ajouter une formule </a></p>
  <div id="modal_formule" class="modal">
    <form class="p-5 center-align" action="<?= URL ?>administration/addSubscription"  method="post">
				<div class="row">
					<div class="col s6 m6 offset-m1">
						<input class="center-align" type="text" name="type_dance" placeholder="Fréquence et nom du cours" required>
            <span class="helper-text"> Insérez la fréquence par semaine du cours et son nom. Par exemple un cours
            de lindy par semaine sera nommé 1lindy. </span>
					</div>
          <div class="col s4 m4">
            <input class="center-align" type="text" name="price" placeholder="Prix" required>
          </div>
        </div>

        <div class="row">
					<div class="col s8 m8 offset-m2">
						<input class="center-align" type="text" name="type_dance" placeholder="Description" required>
					</div>
        </div>

        <div class="row">
          <div class="col s4 m4 offset-m2">
            <label for="lower_price">Réduction</label>
            <input type="hidden" name="lower_price" value="0">
            <div class="switch flex-row">
              <label>
                Non
                <input type="checkbox" name="lower_price" value=1>
                <span class="lever"></span>
                Oui
              </label>
            </div>
          </div>

          <div class="col s4 m4">
            <label for="installment_payment">Paiement 3x</label>
            <input type="hidden" name="installment_payment" value="0">
            <div class="switch flex-row">
              <label>
                Non
                <input type="checkbox" name="installment_payment" value=1>
                <span class="lever"></span>
                Oui
              </label>
            </div>
          </div>
        </div>

        <div class="row">
					<div class="col s8 m8 offset-m2">
						<input class="center-align" type="text" name="helloasso_link" placeholder="Lien Helloasso">
					</div>
				</div>

			<button type="submit" name="button"> Ajouter </button>
    </form>
  </div>

  <ul class="collapsible">
    <li>
      <div class="collapsible-header background-blue white-text"><p> Solo </p></div>
      <div class="collapsible-body background-blue">
        <table class="table_formule highlight centered white-text">
          <thead>
            <tr>
              <th>Fréquence et nom</th>
              <th>Réduction</th>
              <th>Paiement en plusieurs fois</th>
              <th> Prix </th>
              <th> Hello Asso </th>
              <th> </th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($solo as $data){ ?>
            <tr>
              <td><?= $data['type_dance'] ?></td>
              <td><?= $data['lower_price'] ?></td>
              <td> <?= $data['installment_payment'] ?></td>
              <td><?= $data['price'] ?></td>
              <td><a href="<?= $data['helloasso_link'] ?>"> Lien </a></td>
              <td>
                <a href="#modifier_formule<?= $data['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">create</i></a>
                <a href="#supprimer_formule<?= $data['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">cancel</i></a>

                <div id="modifier_formule<?= $data['id'] ?>" class="modal">
                  <h1 class="center-align"> Modifier une vidéo </h1>
                  <form class="p-5 center-align" action="<?= URL ?>administration/updateSubscription"  method="post">
                    <input type="hidden" name="id" value="<?=  $data['id'] ?>">
                    <div class="row">
                      <div class="col s5 m5 offset-m3">
                        <input class="center-align" type="text" name="name" value="<?= $data['type_dance'] ?>" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s5 m5 offset-m1">
                        <label for="lower_price">Réduction</label>
                        <input type="hidden" name="lower_price" value="0">
                        <div class="switch flex-row">
                          <label>
                            Non
                            <?php if($data['lower_price'] == "Oui"){ ?>
                            <input type="checkbox" name="lower_price" value=1 checked>
                          <?php }else{ ?>
                            <input type="checkbox" name="lower_price" value=1>
                          <?php } ?>
                            <span class="lever"></span>
                            Oui
                          </label>
                        </div>
                      </div>

                      <div class="col s4 m4">
                        <label for="installment_payment">Paiement en plusieurs fois</label>
                        <input type="hidden" name="installment_payment" value="0">
                        <div class="switch flex-row">
                          <label>
                            Non
                            <?php if($data['installment_payment'] == "Oui"){ ?>
                            <input type="checkbox" name="installment_payment" value=1 checked>
                          <?php }else{ ?>
                            <input type="checkbox" name="installment_payment" value=1>
                          <?php } ?>
                            <span class="lever"></span>
                            Oui
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s10 m10 offset-m1">
                        <input class="center-align" type="text" name="name" value="<?= $data['helloasso_link'] ?>" required>
                      </div>
                    </div>

                    <button type="submit" name="button">Modifier</button>
                  </form>

              </td>
            </tr>
            </div>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </li>

    <li>
      <div class="collapsible-header background-blue white-text"><p> Lindy Hop </p></div>
      <div class="collapsible-body background-blue">
        <table class="table_formule highlight centered white-text">
          <thead>
            <tr>
              <th>Fréquence et nom</th>
              <th>Réduction</th>
              <th>Paiement en plusieurs fois</th>
              <th> Prix </th>
              <th> Hello Asso </th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($lindy as $data){ ?>
            <tr>
              <td><?= $data['type_dance'] ?></td>
              <td><?= $data['lower_price'] ?></td>
              <td> <?= $data['installment_payment'] ?></td>
              <td><?= $data['price'] ?></td>
              <td><a href="<?= $data['helloasso_link'] ?>"> Lien </a></td>
              <td>
                <a href="#modifier_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">create</i></a>
                <a href="#supprimer_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">cancel</i></a>
              </td>
            </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </li>

    <li>
      <div class="collapsible-header background-blue white-text"><p> Solo & Lindy Hop </p></div>
      <div class="collapsible-body background-blue">
        <table class="table_formule highlight centered white-text">
          <thead>
            <tr>
              <th>Fréquence et nom</th>
              <th>Réduction</th>
              <th>Paiement en plusieurs fois</th>
              <th> Prix </th>
              <th> Hello Asso </th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($soloLindy as $data){ ?>
            <tr>
              <td><?= $data['type_dance'] ?></td>
              <td><?= $data['lower_price'] ?></td>
              <td> <?= $data['installment_payment'] ?></td>
              <td><?= $data['price'] ?></td>
              <td><a href="<?= $data['helloasso_link'] ?>"> Lien </a></td>
              <td>
                <a href="#modifier_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">create</i></a>
                <a href="#supprimer_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">cancel</i></a>
              </td>
            </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </li>
  </ul>
</div>
