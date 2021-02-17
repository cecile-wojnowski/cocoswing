<?php include('admin_nav.php'); ?>

<?php //var_dump($solo); ?>
<?php //var_dump($lindy); ?>
<?php //var_dump($soloLindy); ?>
<div class="container">
  <h2 class="center-align h2_compte"> Formules </h2>

  <ul class="collapsible">
    <li>
        <div class="collapsible-header"><p> Solo </p></div>
        <div class="collapsible-body">
          <table class="table_formule highlight centered striped">
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
                  <form class="p-5 form_gestion_demandes" method="post">
                    <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                    <button type="submit" name="button"> Modifier </button>
                  </form>
                </td>
              </tr>
                <?php } ?>
            </tbody>
          </table>

        </div>
    </li>

    <li>
      <div class="collapsible-header"><p> Lindy Hop </p></div>
      <div class="collapsible-body">
        <table class="table_formule highlight centered striped">
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
                <form class="p-5 form_lindy" method="post">
                  <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  <button type="submit" name="button"> Modifier </button>
                </form>
              </td>
            </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </li>

    <li>
      <div class="collapsible-header"><p> Solo & Lindy Hop </p></div>
      <div class="collapsible-body">
        <table class="table_formule highlight centered striped">
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
                <form class="p-5 form_soloLindy" method="post">
                  <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  <button type="submit" name="button"> Modifier </button>
                </form>
              </td>
            </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </li>
  </ul>
</div>
