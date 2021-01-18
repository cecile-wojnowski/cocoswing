<?php include('admin_nav.php'); ?>

<h2 class="h2_compte"> Liste des cours </h2>
<p class="center-align"> Cliquez sur l'un des cours pour visualiser les demandes de participation reçues. </p>

<?php //var_dump($solo); ?>
<?php //var_dump($lindy); ?>

<div class="row">
  <div class="col s5 m5 offset-m1">
    <p class="center-align">Cours Solo</p>
    <ul>
    <?php
    for($i = 0; $i < count($solo['solo']); $i++) { ?>
      <li>
        <a href="gestionDemandes/<?= $solo['solo'][$i]['id'] ?>">
          <?= $solo['solo'][$i]['type_dance'] . " " .  $solo['solo'][$i]['level'] ." " . $solo['solo'][$i]['day'] ?>
        </a>
      </li>
    <?php
    }
    ?>
    </ul>
  </div>

  <div class="col s5 m5 offset-m1">
    <p class="center-align">Cours Lindy Hop</p>
    <ul>
    <?php
    for($i = 0; $i < count($lindy['lindy']); $i++) { ?>
      <li>
        <a href="gestionDemandes/<?= $lindy['lindy'][$i]['id'] ?>">
          <?= $lindy['lindy'][$i]['type_dance'] . " " .  $lindy['lindy'][$i]['level'] ." " . $lindy['lindy'][$i]['day'] ?>
        </a>
      </li>
    <?php
    }
    ?>
    </ul>
  </div>
</div>
