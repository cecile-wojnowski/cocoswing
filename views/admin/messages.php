<?php include('admin_nav.php'); ?>

<?php //var_dump($messages); ?>

<div class="container">
  <h2 class="center-align h2_compte"> Messages reçus </h2>

  <div class="row">
    <div class="col s12 m12">
      <table class="striped centered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Message</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $data){ ?>
          <tr>
            <td><?= $data['reception_date'] ?></td>
            <td><?= $data['family_name'] . " " . $data['first_name'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['message'] ?></td>
            <td>
              <form class="" action="" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                supprimer
              </form>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
