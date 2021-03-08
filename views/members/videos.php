<?php include('profil_nav.php'); ?>
<div class="container">

<h2 class="center-align h2_compte"> Nos vidéos </h2>
  <div class="row">
    <?php //var_dump($videos);

    for($i = 0; $i < count($videos); $i++) { ?>

      <div class="col m6">
        <iframe width="400" height="315" src="<?= $videos[$i]['url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="center-align"><?=  $videos[$i]['name'] ?></p>
        <p class="center-align">________</p>
      </div>

    <?php } ?>
  </div>

  <?php if($_SESSION['admin'] == 1): ?>
  <p class="center-align"><a href="#modal_video" class="modal-trigger" rel="modal:open"> Ajouter une vidéo </a></p>
  <?php endif; ?>
  <!-- Modal d'ajout de cours -->
  <div id="modal_video" class="modal">
    <h1 class="center-align"> Ajouter une vidéo </h1>
      <form class="p-5 form_course center-align" action="<?= URL ?>administration/addVideo"  method="post">

  				<div class="row">
  					<div class="col s6 m6">
  						<input type="text" name="name" placeholder="Nom de la vidéo" required>
  					</div>
  					<div class="col s6 m6">
  						<input type="text" name="url" placeholder="Lien de la vidéo">
  					</div>
  				</div>

  			<button type="submit" name="button"> Ajouter </button>
      </form>
  	</div>
</div>
