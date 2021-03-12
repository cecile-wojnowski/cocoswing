<?php include('profil_nav.php'); ?>

<h2 class="center-align h2_compte"> Mes paiements </h2>

<?php if(!empty($historique)){ ?>
<p class="center-align"> Historique des paiements effectués. </p>

<div class="row">
  <div class="col m10 s10 offset-m1">
    <table class="centered striped">
      <thead>
        <tr>
          <th>Cours</th>
          <th>Date</th>
          <th>Montant payé</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($historique as $data){ ?>
        <tr>
          <td><?= $data['description'] ?></td>
          <td><?= $data['year'] ?></td>
          <td> <?= $data['price'] . " euros" ?></td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php }else{ ?>
  <p class="center-align">Votre historique d'achats est vide.</p>
<?php } ?>
