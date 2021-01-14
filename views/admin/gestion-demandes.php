<?php include('admin_nav.php'); ?>

<?php //var_dump($leaders); ?>
<?php //var_dump($followers); ?>
<?php //var_dump($indifferents); ?>

<h2 class="h2_compte"> Demandes de participation aux cours </h2>
<div class="row">
  <div class="col m8 offset-m2">
    <p class="left">Demandes en attente</p>
    <p class="right">Demandes acceptées</p>
  </div>
</div>

<div class="row">
  <div class="col m5 s5 offset-m1">
  <?php if(!empty($leaders)){ ?>
    <div class="row">
      <p> Leaders </p>
      <table class="highlight centered">
        <thead>
          <tr>
            <th> </th>
            <th>Nom</th>
            <th>N° de téléphone</th>
            <th>E-mail</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($leaders as $data){ ?>
          <tr>
            <td><?= $data['status'] ?></td>
            <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
            <td> <?= $data['phone'] ?></td>
            <td><?= $data['email'] ?></td>
            <td>
              <form class="p-5 form_gestion_demandes" method="post">
                <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
                <button type="submit" name="button"> Accepter </button>
              </form>
            </td>
          </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>

<?php if(!empty($followers)){ ?>
  <div class="row">
    <p> Followers </p>
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($followers as $data){ ?>
        <tr>
          <td><?= $data['status'] ?></td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <form class="p-5 form_gestion_demandes" method="post">
              <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
              <button type="submit" name="button"> Accepter </button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php } ?>


  <?php if(!empty($indifferents)){ ?>
  <div class="row">
    <p> Indifférents </p>
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($indifferents as $data){ ?>
        <tr>
          <td><?= $data['status'] ?></td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <form class="p-5 form_gestion_demandes" method="post">
              <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
              <button type="submit" name="button"> Accepter </button>
            </form>
          </td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>
  </div>

  <div class="col m5 s5 offset-m1">
  <?php if(!empty($admisLeaders)){ ?>
    <div class="row">
      <p> Leaders </p>
      <table class="highlight centered">
        <thead>
          <tr>
            <th> </th>
            <th>Nom</th>
            <th>N° de téléphone</th>
            <th>E-mail</th>
            <th></th>
          </tr>
        </thead>

      <tbody>
        <?php foreach($admisLeaders as $data){ ?>
        <tr>
          <td><?= $data['status'] ?></td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <form class="p-5 form_gestion_demandes" method="post">
              <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
              <button type="submit" name="button"> Supprimer </button>
            </form>
          </td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
<?php  } ?>


<?php if(!empty($admisFollowers)){ ?>
  <div class="row">
    <p> Followers </p>
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($admisFollowers as $data){ ?>
        <tr>
          <td><?= $data['status'] ?></td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <form class="p-5 form_gestion_demandes" method="post">
              <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
              <button type="submit" name="button"> Supprimer </button>
            </form>
          </td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
<?php  } ?>
</div>

<?php if(!empty($admisIndifferents)){ ?>
  <div class="row">
    <p> Indifférents </p>
    <table class="highlight centered">
      <thead>
        <tr>
          <th> </th>
          <th>Nom</th>
          <th>N° de téléphone</th>
          <th>E-mail</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($admisIndifferents as $data){ ?>
        <tr>
          <td><?= $data['status'] ?></td>
          <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
          <td> <?= $data['phone'] ?></td>
          <td><?= $data['email'] ?></td>
          <td>
            <form class="p-5 form_gestion_demandes" method="post">
              <input type="hidden" name="id_course_request" value="<?= $data['id'] ?>">
              <button type="submit" name="button"> Supprimer </button>
            </form>
          </td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
<?php  } ?>
</div>
