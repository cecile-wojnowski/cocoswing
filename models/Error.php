<?php
class Error extends Model{
  public function __construct()
{
    // Nous définissons la table par défaut de ce modèle
    $this->table = "errors";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
}
} ?>
