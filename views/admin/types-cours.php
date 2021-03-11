<?php include('admin_nav.php'); ?>
<?php //var_dump($typesCourses); ?>
<h2 class="center-align h2_compte"> Types de cours </h2>

<p class="center-align"> Vous pouvez associer une couleur à un type de danse en fonction de son niveau. <br>
Ce type de cours nouvellement créé pourra être choisi lors de la création d'un cours dans le planning. </p>

<div class="row">
  <div class="col m10 s10 offset-m1">

  <table class="centered striped">
    <thead>
      <tr>
        <th>Nom et niveau du cours</th>
        <th>Couleur</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($typesCourses as $data){ ?>
      <tr>
        <td>
          <input id="name_level_<?= $data["id"] ?>" type="text" class="name_level_input" name="name_level" value="<?= $data['name_level'] ?>">
        </td>
        <td>
          <input id="color_<?= $data["id"] ?>" type="color" name="colorCourse" value="<?= $data['color'] ?>">
        </td>
        <td>
          <button type="submit" name="button" class="updateTypeCourse" id="update_<?= $data["id"] ?>"> Modifier </button>
          <a href="#supprimer_type_cours<?= $data["id"] ?>" class="modal-trigger" rel="modal:open">
            <button type="button" name="button" class="deleteTypeCourse"> Supprimer </button>
          </a>

          <div id="supprimer_type_cours<?= $data["id"] ?>" class="modal">
            <form action="deleteTypeCourse" method="post">
              <h1 class="center-align"> Supprimer ce type de cours </h1>
              <p>Etes-vous sûr de vouloir supprimer ce type de cours ? </p>
              <input type="hidden" name="id" value="<?= $data["id"] ?>">
              <button type="submit" name="button">Supprimer</button>
              <button class="modal-close" type="button" name="button">Retour</button>
            </form>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>

<p class="center-align"><a href="#modal_type_cours" class="modal-trigger" rel="modal:open">Créer un nouveau type de cours</a></p>

<div id="modal_type_cours" class="modal">
  <div class="modal-content">
    <h1 class="center-align"> Ajouter un type de cours </h1>
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
</div>
