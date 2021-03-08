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
</div>
