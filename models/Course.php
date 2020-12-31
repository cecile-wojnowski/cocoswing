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
    $courses = $this->getAll(); // On récupère tous les cours stockés en base de données

    $course = [];
    foreach($courses as $data){

      $day = $data['day'] ; // Stocker $data['day'] dans une variable permettra de l'assigner comme index du tableau $course
      $level = $data['level'];


      // Formatage des dates
      // Récupération de l'heure uniquement
      $hour = new Datetime($data['start_time']);
      $time_format= $hour->format('H');
      // Récupération de l'heure et des minutes
      $start_time_format = new Datetime($data['start_time']);
      $start_time = $start_time_format->format('H:i');
      $end_time_format = new Datetime($data['end_time']);
      $end_time = $end_time_format->format('H:i');

      // Mise en forme des noms de danse
      $type_dance = strtoupper($data['type_dance']); // On met en majuscule le nom des danses
      $dance_name = str_replace("_", " ", $type_dance); // On remplace le _ de type_dance par un espace vide

      $course[$day][$time_format] = [$dance_name ." ". $level, $start_time, $end_time]; // Donne par exemple : $course['lundi'][18] = 18:45 - 19:45 SOLO 2
    }

    return $course;
  }


} ?>
