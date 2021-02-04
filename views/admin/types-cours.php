<?php include('admin_nav.php'); ?>

<h2 class="h2_compte"> Types de cours </h2>

<p class="center-align"> Vous pouvez associer une couleur à un type de danse en fonction de son niveau. <br>
Ce type de cours nouvellement créé pourra être choisi lors de la création d'un cours dans le planning. </p>

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

<a href="#modal_type_cours" class="modal-trigger" rel="modal:open">Créer un nouveau type de cours</a>

<div id="modal_type_cours" class="modal modal_courses">
  <h1> Ajouter un type de cours </h1>
    <form class="p-5 form_course center-align" action="#"  method="post">
  		<div class="row">
  			<div class="col s8 m8 offset-m2">
  				<input type='text' name="name_level" placeholder="Nom et niveau du cours"></input>
  			</div>
  		</div>

      <div class="row">
        <div class="col s8 m8 offset-m2">
          <label for="color" class="label_size"> Associer une couleur au cours : </label> <br>
  				<input type='color' name="color"></input>
  			</div>
      </div>
			<button type="submit" name="button"> Ajouter </button>
    </form>
</div>
