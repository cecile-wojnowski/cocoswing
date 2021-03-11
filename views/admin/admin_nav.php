<?php if($_SESSION['admin'] != 1){
  header('Location:'.URL.'members/monProfil');
} ?>
<ul class="liste_compte">
  <li><a class="a_compte" href="<?= URL ?>administration/messages"> Les messages</a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/listeCours"> Les demandes </a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/gestionDocuments"> Les documents </a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/gestionMembres"> Les membres </a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/typesCours"> Les types de cours </a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/gestionFormules"> Les formules </a></li>
  <li><a class="a_compte" href="<?= URL ?>administration/stages"> Les stages </a></li>
  <li><a class="a_compte" href="<?= URL ?>members/monProfil"> Retour à l'espace membre </a></li>
</ul>
