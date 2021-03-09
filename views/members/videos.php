<?php include('profil_nav.php'); ?>
<div class="container">

<h2 class="center-align h2_compte"> Nos vidéos </h2>

<?php if($_SESSION['admin'] == 1): ?>
<p class="center-align"><a href="#modal_video" class="modal-trigger" rel="modal:open"> Ajouter une vidéo </a></p>
<?php endif; ?>

  <div class="row">
    <?php //var_dump($videos);

    for($i = 0; $i < count($videos); $i++) { ?>

      <div class="col m6">
        <iframe width="400" height="315" src="<?= $videos[$i]['url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="center-align"><?=  $videos[$i]['name'] ?>
          <a href="#modifier_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">create</i></a>
          <a href="#supprimer_video<?= $videos[$i]['id'] ?>" class="modal-trigger" rel="modal:open"><i class="material-icons">cancel</i></a>
        </p>
        <p class="center-align">________</p>
      </div>

      <div id="modifier_video<?= $videos[$i]['id'] ?>" class="modal">
        <h1 class="center-align"> Modifier une vidéo </h1>
        <form class="p-5 center-align" action="<?= URL ?>administration/updateVideo"  method="post">
          <input type="hidden" name="id" value="<?=  $videos[$i]['id'] ?>">
          <div class="row">
            <div class="col s8 m8 offset-m2">
              <input class="center-align" type="text" name="name" value="<?= $videos[$i]['name'] ?>" required>
            </div>
          </div>
          <div class="row">
            <div class="col s8 m8 offset-m2">
              <input class="center-align" type="text" name="url" value="<?= $videos[$i]['url'] ?>">
              <span class="helper-text"> Copier/coller le lien https de la vidéo youtube souhaitée:
              Partager > Intégrer > src="https://URL" </span>
            </div>
          </div>

          <button type="submit" name="button"> Modifier </button>
        </form>
      </div>

      <div id="supprimer_video<?= $videos[$i]['id'] ?>" class="modal">
        <h1 class="center-align"> Supprimer une vidéo </h1>
        <p class="center-align"> Vous êtes sur le point de supprimer la vidéo <?= $videos[$i]['name'] ?>.</p>
        <form class="p-5 center-align" action="<?= URL ?>administration/deleteVideo"  method="post">
          <input type="hidden" name="id" value="<?=  $videos[$i]['id'] ?>">
          <button type="submit" name="button"> Valider </button>
          <button type="button" class="modal-close" name="button">Retour</button>
        </form>
      </div>

  <?php } ?>
  </div>

  <div id="modal_video" class="modal">
    <h1 class="center-align"> Ajouter une vidéo </h1>
    <form class="p-5 center-align" action="<?= URL ?>administration/addVideo"  method="post">

				<div class="row">
					<div class="col s8 m8 offset-m2">
						<input class="center-align" type="text" name="name" placeholder="Nom de la vidéo" required>
					</div>
        </div>
        <div class="row">
					<div class="col s8 m8 offset-m2">
						<input class="center-align" type="text" name="url" placeholder="Lien">
            <span class="helper-text"> Copier/coller le lien https de la vidéo youtube souhaitée:
            Partager > Intégrer > src="https://URL" </span>
					</div>
				</div>

			<button type="submit" name="button"> Ajouter </button>
    </form>
  </div>
</div>
