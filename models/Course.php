<?php
class Course extends Model{
  protected $id;
  private $jour;
  private $horaire;
  private $niveau;
  private $type;
  private $profs; // tableau ?
  public function __construct()
  {
      // Nous définissons la table par défaut de ce modèle
      $this->table = "courses";

      // Nous ouvrons la connexion à la base de données
      $this->getConnection();
  }


} ?>
