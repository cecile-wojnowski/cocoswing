<?php include('profil_nav.php'); ?>

<h2 class="center-align h2_compte"> Demandes en attente </h2>

<?php //var_dump($documents); ?>
<?php if(!empty($documents)){ ?>
<p class="center-align"> Justificatif en attente de vérification </p>
<div class="row">
  <div class="col s5 m4 offset-m4">
    <div class="card">
      <?php foreach($documents as $data){ ?>
      <div class="card-image">
        <img class="materialboxed" width="300" src="../ressources/img/<?= $data['filename'] ?>">
      </div>
      <div class="card-content">
        <p class="font-size-18 center-align <?php if($data['status'] == 'Fichier refusé'){
          echo "red-text text-darken-3";
        }elseif($data['status'] == 'Fichier accepté'){
          echo "text_green";
        } ?>"><?= $data['status'] ?></p>
      </div>

      <?php if($data['status'] === 'Fichier refusé'){ ?>
      <div class="card-action">
        <p class="center-align">Envoyer un autre justificatif</p>
        <form class="form_change_document center-align" method="post" enctype="multipart/form-data">
          <input type="file" id="justificatif" name="justificatif" accept="image/png, image/jpeg">
          <button type="submit" name="button">Envoyer</button>
        </form>
      </div>
      <?php } ?>
      <?php } ?>

    </div>
  </div>
</div>
<?php } ?>

<?php if(empty($demandesCours)){ ?>
  <p class="center-align">Vous n'avez pas de demande en attente.</p>
<?php }else{ ?>
<p class="center-align"> Vos demandes d'inscription aux cours. </p>

<div class="row">
  <div class="col m10 s10 offset-m1">
  <table class="highlight centered">
    <thead>
      <tr>
        <th> </th>
        <th>Cours</th>
        <th>Profs</th>
        <th>Jour & horaire</th>
        <th>Lieu</th>
        <th>Rôle choisi *</th>
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
        <td>
          <form class="p-5 form_role_danse" method="post">
            <div class="row">
              <div class="col s6 m6 offset-m3">
                <select name="role_dance">
                  <option value="indifferent" selected> Indifférent </option>
                  <option value="leader"> Leader </option>
                  <option value="follower"> Follower </option>
                </select>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
              </div>
              <button type="submit" name="button"> Modifier </button>
            </div>
          </form>
        </td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
  </div>
</div>

  <p class="center-align">  * Le choix du rôle est modifiable tant que la demande n'a pas été acceptée. </p>

<?php } ?>
