<?php
try
{
  $bdd = new PDO('mysql:host=localhost; port=3308; dbname=cocoswing', 'root', '');

  $bdd->exec("SET CHARACTER SET utf8");

}
catch(Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


?>
