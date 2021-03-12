<?php if(empty($_SESSION)){
  header('Location:'.URL.'website/index');
} ?>
<ul class="liste_compte">

  <?php if($_SESSION['member'] == 0){ ?>
  <li><a class="a_compte" href="<?= URL ?>members/adhesion"> S'inscrire à un cours </a></li>
  <?php }elseif($_SESSION['member'] == 1){ ?>
  <li><a class="a_compte" href="<?= URL ?>members/videos"> Nos vidéos </a></li>
  <?php } ?>
  <li><a class="a_compte" href="<?= URL ?>members/planning"> Voir le planning </a></li>
  <li><a class="a_compte" href="<?= URL ?>members/monProfil"> Mes informations </a></li>
  <li><a class="a_compte" href="<?= URL ?>members/demandesCours"> Mes demandes en attente </a></li>
  <li><a class="a_compte" href="<?= URL ?>members/historiqueAchats"> Mes paiements </a></li>
</ul>
<?php if($_SESSION['admin'] == 1){ ?>
<p class="center-align"><a class="a_compte" href="<?= URL ?>administration/listeCours"> Espace administrateur </a></p>
<?php } ?>
