<?php include('admin_nav.php'); ?>

<?php //var_dump($stages); ?>

<h2 class="center-align h2_compte"> Les stages </h2>

<div class="row">
  <div class="col m10 s10 offset-m1">

  <table class="centered highlight">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($stages as $data){ ?>
      <tr>
          <td>
            <input id="name_<?= $data["id"] ?>" type="text" name="name" value="<?= $data['name'] ?>">
          </td>
          <td>
            <input id="date_<?= $data["id"] ?>" type="date" name="date" value="<?= $data['start_date'] ?>">
          </td>
          <td>
            <button type="submit" name="button" class="updateTraineeship" id="update_<?= $data["id"] ?>"> Modifier </button>
            <a href="#supprimer_stage<?= $data["id"] ?>" class="modal-trigger" rel="modal:open">
              <button type="button" name="button" class="deleteTypeCourse"> Supprimer </button>
            </a>

            <div id="supprimer_stage<?= $data["id"] ?>" class="modal">
              <form action="deleteTraineeship" method="post">
                <h1 class="center-align"> Suppression </h1>
                <p> Etes-vous sûr de vouloir supprimer ce stage ? </p>
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

<p class="center-align"><a href="#modal_type_cours" class="modal-trigger" rel="modal:open">Ajouter un stage</a></p>

<div id="modal_type_cours" class="modal">
  <div class="modal-content">
    <h1 class="center-align"> Ajouter un stage </h1>
      <form class="p-5 form_course center-align" action="#"  method="post">
    		<div class="row">
    			<div class="col s8 m8 offset-m2">
    				<input type='text' name="name" placeholder="Nom du stage"></input>
    			</div>
    		</div>

        <div class="row">
    			<div class="col s8 m8 offset-m2">
    				<input type='date' name="date" placeholder="Nom du stage"></input>
    			</div>
    		</div>
  			<button type="submit" name="button"> Ajouter </button>
      </form>
    </div>
</div>
