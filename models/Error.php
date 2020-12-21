<?php
class Error extends Model{
  private $_bdd;
  private $_id;
  private $_typeErreur;
  private $_messageErreur;

  public function __construct($_bdd){
    return $this->_connection = $_bdd;
  }

  public function afficherErreur($typeErreur){
    $get_error = $this->_connection->prepare("SELECT * FROM erreurs WHERE type_erreur = '$typeErreur' ");
    $get_error->execute();
    $resultat = $get_error->fetch();

    echo $resultat['message_erreur'];
  }
  public function __construct()
{
    // Nous définissons la table par défaut de ce modèle
    $this->table = "errors";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
}
} ?>
