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

          <td><?php // echo $data['admin'] ?>
            <form class="p-5 form_gestion_droits col m5 offset-m3" method="post">
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <input type="hidden" name="admin" value="0">
              <div class="switch">
                <label>
                  Non
                  <input type="checkbox" name="admin" value=1>
                  <span class="lever"></span>
                  Oui
                </label>
              </div>
            <button type="submit" name="button" class="gestionDroits"> Changer les droits </button>
          </form>

        </td>

        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>
