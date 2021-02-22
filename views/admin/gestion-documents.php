<?php include('admin_nav.php'); ?>
<div class="container">
  <h2 class="center-align h2_compte"> Gestion des justificatifs </h2>

  <?php //var_dump($fichiers); ?>

  <div class="row">
    <div class="col s12 m12">
      <table class="striped centered">
        <thead>
          <tr>
            <th></th>
            <th>Nom</th>
            <th>N° de téléphone</th>
            <th>E-mail</th>
            <th> Justificatif </th>
            <th> Statut </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($fichiers as $data){ ?>
          <tr>
            <td class="td_size"> <img class="user_picture_mini" src="../ressources/img/<?= $data['picture'] ?>" alt="Photo de l'utilisateur"> </td>
            <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
            <td><?= $data['phone'] ?></td>
            <td><?= $data['email'] ?></td>
            <td>
              <div class="table_img_centered">
                <img class="materialboxed" width="200" src="../ressources/img/<?= $data['filename']?>">
              </div>
            </td>
            <td> <?= $data['status'] ?></td>
            <td>
              <form class="form_admin_file" method="post">
                <input type="hidden" name="id_file" value="<?= $data['id'] ?>">
                <button type="button" id="fileAccepted" name="fileAccepted"> Accepter </button>
                <button type="button" id="fileDenied" name="fileAccepted"> Refuser </button>
              </form>

            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
