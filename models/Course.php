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
    $courses = $this->_connection->prepare("SELECT * FROM courses INNER JOIN types_courses
      ON courses.id_type_course = types_courses.id");
    $courses->execute();
    $resultat = $courses->fetchAll(PDO::FETCH_ASSOC);

    $course = [];
    for($i = 0; $i < count($resultat); $i++) {
      $day = $resultat[$i]['day'];
      $level = $resultat[$i]['level'];
      $id = $resultat[$i]['id'];
      $description = ucfirst($resultat[$i]['description']);
      $address = ucfirst($resultat[$i]['address']);
      $color = $resultat[$i]['color'];

      // Formatage des dates
      $hour = new Datetime($resultat[$i]['start_time']);
      $time_format= $hour->format('H');
      // Récupération de l'heure et des minutes
      $start_time_format = new Datetime($resultat[$i]['start_time']);
      $start_time = $start_time_format->format('H:i');
      $end_time_format = new Datetime($resultat[$i]['end_time']);
      $end_time = $end_time_format->format('H:i');

      // Mise en forme des noms de danse
      $type_dance = strtoupper($resultat[$i]['type_dance']); // On met en majuscule le nom des danses
      $dance_name = str_replace("_", " ", $type_dance); // On remplace le _ de type_dance par un espace vide

      $course[$day][$time_format] = ['type_dance' => $dance_name ." ". $level,
      'start_time' => $start_time,
      'end_time' => $end_time,
      'id' => $id,
      'day' => $day,
      'description' => $description,
      'address' => $address,
      'color' => $color];
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

    $delete = $this->_connection->prepare("DELETE FROM courses WHERE id = ? ");
    $delete->execute([$this->_id]);
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

  public function afficherTypesCours(){
    $courses = $this->_connection->prepare("SELECT * FROM types_courses");
    $courses->execute();
    $resultat = $courses->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function ajouterTypeCours(){
    $addTypeCourse = $this->_connection->prepare("INSERT INTO types_courses (name_level, color) VALUES (?, ?)");
    $addTypeCourse->execute([
      $_POST['name_level'],
      $_POST['color']
    ]);
  }

  public function modifierTypeCours(){

  }

  public function supprimerTypeCours(){

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
