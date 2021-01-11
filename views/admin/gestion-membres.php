<?php include('admin_nav.php'); ?>

<?php //var_dump($utilisateurs); ?>

<h2 class="h2_compte"> Demandes de participation aux cours </h2>
<div class="row">
  <p>Explications éventuelles</p>
</div>

<div class="row">
  <div class="col m12 s12">
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
          <th>Pseudo Facebook</th>
          <th>Date d'inscription</th>
          <th>Adhésion active</th>
          <th>Droits d'administration</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($utilisateurs as $data){ ?>
        <tr>
          <td class="td_size"> <img class="user_picture_mini" src="../ressources/img/<?= $data['picture'] ?>" alt="Photo de l'utilisateur"> </td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['pseudo_facebook'] ?></td>
          <td><?= $data['registration_date'] ?></td>
          <td><?= $data['member'] ?></td>
          <td><?= $data['admin'] ?></td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>
