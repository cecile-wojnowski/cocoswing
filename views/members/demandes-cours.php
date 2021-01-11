<?php include('profil_nav.php'); ?>

<h2 class="h2_compte"> Mes cours </h2>

<p class="center-align"> Vos demandes d'inscription aux cours & stages. </p>

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
                <input  type="hidden" name="id" value="<?= $data['id'] ?>">
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
