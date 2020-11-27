<?php
class Erreur{
  private $_bdd;
  private $_id;
  private $_typeErreur;
  private $_messageErreur;

  public function __construct($_bdd){
    return $this->_bdd = $_bdd;
  }

  public function afficherErreur($typeErreur){
    $get_error = $this->_bdd->prepare("SELECT * FROM erreurs WHERE type_erreur = '$typeErreur' ");
    $get_error->execute();
    $resultat = $get_error->fetch();

    echo $resultat['message_erreur'];
  }
}

 ?>
