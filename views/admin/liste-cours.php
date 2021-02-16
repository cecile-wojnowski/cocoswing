<?php include('admin_nav.php'); ?>
<div class="container">
<h2 class="center-align h2_compte"> Liste des cours </h2>
<p class="center-align"> Cliquez sur l'un des cours pour visualiser les demandes de participation reçues. </p>

<?php //var_dump($solo); ?>
<?php //var_dump($lindy); ?>

<p class="center-align">Cours Solo</p>
<div class="row center-align">
  <div class="col s12 m12 ">
  <?php   for($i = 0; $i < count($solo['solo']); $i++) { ?>
  <div class="col m3">
    <a class="white-text" href="gestionDemandes/<?= $solo['solo'][$i]['id'] ?>">
    <div class="card-panel teal waves-effect waves-block waves-light hoverable">
      <?= $solo['solo'][$i]['name_planning'] . " <br> " . $solo['solo'][$i]['day'] ?>
    </div>
  </a>
  </div>
    <?php
    }
    ?>
</div>
  </div>

<p class="center-align">Cours Lindy Hop</p>
<div class="row center-align">
  <div class="col s12 m12">
  <?php for($i = 0; $i < count($lindy['lindy']); $i++) { ?>
  <div class="col m3">
    <a class="white-text" href="gestionDemandes/<?= $lindy['lindy'][$i]['id'] ?>">
      <div class="card-panel teal waves-effect waves-block waves-light hoverable">
        <?= $lindy['lindy'][$i]['name_planning'] . "<br>" . $lindy['lindy'][$i]['day'] ?>
      </div>
    </a>
  </div>
    <?php
    }
    ?>
</div>
</div>
</div>
