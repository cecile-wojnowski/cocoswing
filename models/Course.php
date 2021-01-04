<?php
class Course extends Model{
  protected $_id;
  private $_day;
  private $_startTime;
  private $_endTime;
  private $_level;
  private $_typeDance;
  private $_address;
  private $_description;

  // private $_teachers;  ajouter les profs ici ?
  public function __construct()
  {
      $this->table = "courses";
      $this->getConnection();
  }

  public function recupererCours(){
    $courses = $this->getAll(); // On récupère tous les cours stockés en base de données

    $course = [];
    foreach($courses as $data){

      $day = $data['day'] ; // Stocker $data['day'] dans une variable permettra de l'assigner comme index du tableau $course
      $level = $data['level'];
      $id = $data['id'];
      $description = $data['description'];
      $address = $data['address'];

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

      $course[$day][$time_format] = [$dance_name ." ". $level, $start_time, $end_time, $id, $day, $description, $address]; // Donne par exemple : $course['lundi'][18] = 18:45 - 19:45 SOLO 2
    }

    return $course;
  }

  public function ajouterCours(){

    $addCourse = $this->_connection->prepare("INSERT INTO courses
      (day, start_time, end_time, level, type_dance, address, description)
      VALUES (?, ?, ?, ?, ?, ?, ?)");

    $addCourse->execute([
      $this->_day,
      $this->_startTime,
      $this->_endTime,
      $this->_level,
      $this->_typeDance,
      $this->_address,
      $this->_description
    ]);
  }

  public function modifierCours(){
  //  echo $this->_id;
    //$id = (int) $this->_id;

    $update = $this->_connection->prepare("UPDATE courses
      SET day = ?,
        start_time = ?,
        end_time = ?,
        level = ?,
        type_dance = ?,
        address = ?,
        description = ?
      WHERE id = $this->_id");

      $update->execute([
        $this->_day,
        $this->_startTime,
        $this->_endTime,
        $this->_level,
        $this->_typeDance,
        $this->_address,
        $this->_description
      ]);
    }

  public function supprimerCours(){

  }

  public function hydrater($donnees = null){
    if (isset($donnees['id']))
      $this->_id = $donnees['id'];

    if (isset($donnees['day']))
      $this->_day = $donnees['day'];

    if (isset($donnees['start_time']))
      $this->_startTime = $donnees['start_time'];

    if (isset($donnees['end_time']))
      $this->_endTime = $donnees['end_time'];

    if (isset($donnees['level']))
      $this->_level = $donnees['level'];

    if (isset($donnees['type_dance']))
      $this->_typeDance = $donnees['type_dance'];

    if (isset($donnees['address']))
      $this->_address = $donnees['address'];

    if (isset($donnees['description']))
      $this->_description = $donnees['description'];
  }

  /**** Getters ***/
  public function id(){
    return $this->_id;
  }

  public function day(){
    return $this->_day;
  }

  public function level(){
    return $this->_level;
  }

  public function typeDance(){
    return $this->_typeDance;
  }

  public function startTime(){
    return $this->_startTime;
  }

  public function endTime(){
    return $this->_endTime;
  }

  public function address(){
    return $this->_address;
  }

  public function description(){
    return $this->_description;
  }

} ?>
