<?php include('admin_nav.php'); ?>

<h2 class="h2_compte"> Types de cours </h2>

<p class="center-align"> Vous pouvez associer une couleur à un type de danse en fonction de son niveau. <br>
Ce type de cours nouvellement créé pourra être choisi lors de la création d'un cours. </p>

<div class="row">
  <div class="col m10 s10 offset-m1">

  <table class="centered striped">
    <thead>
      <tr>
        <th>Nom et niveau du cours</th>
        <th>Couleur</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($typesCourses as $data){ ?>
      <tr>
        <td><?= $data['name_level'] ?></td>
        <td> <input type="color" name="colorCourse" value="<?= $data['color'] ?>"> </td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
  </div>
</div>

<a href="#">Créer un nouveau type de cours</a>
