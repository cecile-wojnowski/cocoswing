<?php include('profil_nav.php'); ?>

<h2 class="h2_compte"> Mes cours </h2>

<p class="center-align"> Vos demandes d'inscription aux cours & stages. </p>

<div class="row">
  <div class="col m10 s10 offset-m1">

  <table>
    <thead>
      <tr>
        <th> </th>
        <th>Cours</th>
        <th>Profs</th>
        <th>Jour & horaire</th>
        <th>Lieu</th>
        <th>Rôle choisi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($demandesCours as $data){ ?>
      <tr>
        <td><?= $data['status'] ?></td>
        <td><?= $data['type_dance'] ?></td>
        <td> <?= $data['profs'] ?></td>
        <td><?= $data['day'] ."<br>". $data['start_time'] . " - " . $data['end_time'] ?></td>
        <td><?= $data['address'] ?></td>
        <td><?= $data['role_dance'] ?></td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
  </div>
</div>
