<?php include('admin_nav.php'); ?>
<?php //var_dump($inscritsStage);
//var_dump($infosStage); ?>

<div class="container">
<h2 class="center-align h2_compte"> <?= $infosStage[0]['name'] ?> </h2>

<div class="row">
  <div class="col m12 s12">
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($inscritsStage as $data){ ?>
        <tr>
          <td class="td_size"> <img class="user_picture_mini" src="../../ressources/img/<?= $data['picture'] ?>" alt="Photo de l'utilisateur"> </td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
