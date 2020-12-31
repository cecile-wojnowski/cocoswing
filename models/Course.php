<?php
class Course extends Model{
  protected $_id;
  private $_day;
  private $_startTime;
  private $_endTime;
  private $_level;
  private $_typeDance;
  private $_address;

  // private $_teachers;  ajouter les profs ici ?
  public function __construct()
  {
      // Nous définissons la table par défaut de ce modèle
      $this->table = "courses";

      // Nous ouvrons la connexion à la base de données
      $this->getConnection();
  }


} ?>
