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

  public function recupererCours(){
    $courses = $this->getAll();

    $course = [];

    foreach($courses as $data){

      $day = $data['day'] ;
      $type_dance = $data['type_dance'];
      $level = $data['level'];

      // On formate la date de début pour ne récupérer que l'heure
      $start_time = new Datetime($data['start_time']);
      $time_format= $start_time->format('H');


      $course[$day][$time_format] = $type_dance . $level;
    }

    return $course;
  }


} ?>
