<?php
class Subscription extends Model{
  private $id;
  private $typeDanse;
  private $frequenceCours;
  private $reduction; // Booléen
  private $estAdherent; // Booléen
  private $paiementMultiple; // Booléen
  private $prix;
  private $lienHelloAsso;
  public function __construct()
{
    // Nous définissons la table par défaut de ce modèle
    $this->table = "subscriptions";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
}
} ?>
