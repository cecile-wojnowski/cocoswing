<?php
class Course extends Model{
  protected $_id;
  protected $_day;
  protected $_startTime;
  protected $_endTime;
  protected $_level;
  protected $_typeDance;
  protected $_address;
  protected $_description;
  protected $_profs;
  protected $_namePlanning;
  protected $_idTypeCourse;

  public function __construct()
  {
      $this->table = "courses";
      $this->getConnection();
  }

  public function recupererCours(){
    $courses = $this->_connection->prepare("SELECT * FROM types_courses INNER JOIN courses
      ON types_courses.id = courses.id_type_course ");
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
      'dance_name' => $dance_name,
      'level'=> $level,
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
    //id_type_course à ajouter ?
    $this->_namePlanning = strtoupper($_POST['type_dance'] . " " . $_POST['level']);
    $addCourse = $this->_connection->prepare("INSERT INTO courses
      (day, start_time, end_time, level, type_dance, address, description, name_planning)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $addCourse->execute([
      $this->_day,
      $this->_startTime,
      $this->_endTime,
      $this->_level,
      $this->_typeDance,
      $this->_address,
      $this->_description,
      $this->_namePlanning
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

/********************************* Types de cours *****************************/
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
    $update = $this->_connection->prepare("UPDATE types_courses SET name_level = ?, color = ?
      WHERE id = ?");
    $update->execute([
      $_POST['name_level'],
      $_POST['color'],
      $_POST['id']
    ]);
  }

  public function supprimerTypeCours(){
    $delete = $this->_connection->prepare("DELETE FROM types_courses WHERE id = ? ");
    $delete->execute([$_POST['id']]);
  }

  /********************************* Stages *****************************/

  public function afficherStages(){
    $stages = $this->_connection->prepare("SELECT * FROM traineeships");
    $stages->execute();
    $resultat = $stages->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      $start_date_format = new Datetime($resultat[$i]['start_date']);
      $resultat[$i]['start_date'] = $start_date_format->format('Y/m/d');
    }

    return $resultat;
  }

  public function getUserTraineeship(){
    $idUser = $_SESSION['id'];

    $stages = $this->_connection->prepare("SELECT * FROM traineeships INNER JOIN users_traineeships
      ON traineeships.id = users_traineeships.id_traineeship
      WHERE users_traineeships.id_user = $idUser");
    $stages->execute();
    $resultat = $stages->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      $start_date_format = new Datetime($resultat[$i]['start_date']);
      $resultat[$i]['start_date'] = $start_date_format->format('Y/m/d');
    }

    return $resultat;

  }

  public function getInfosTraineeship($idTraineeship){
    $stagesInfos = $this->_connection->prepare("SELECT * FROM traineeships WHERE id = $idTraineeship");
    $stagesInfos->execute();
    $resultat = $stagesInfos->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      $resultat[$i]['name'] = ucfirst($resultat[$i]['name']);
    }
    return $resultat;
  }

  public function rejoindreStage(){
    $joinTraineeship = $this->_connection->prepare("INSERT INTO users_traineeships (id_traineeship, id_user)
    VALUES (?,?)");
    $joinTraineeship ->execute([
      $_POST['id'], // id du stage
      $_SESSION['id'] // id de l'utilisateur
    ]);
  }

  public function desinscriptionStage($idStage){
    $idUser = $_SESSION['id'];
    $delete = $this->_connection->prepare("DELETE FROM users_traineeships
      WHERE id_traineeship = $idStage AND id_user = $idUser ");
    $delete->execute();
  }

  public function afficherInscritsStage($idTraineeship){
    // affiche le contenu de users_traineeships en listant les membres et en affichant les infos du stage
    $inscrits = $this->_connection->prepare("SELECT * FROM users INNER JOIN users_traineeships
      ON users.id = users_traineeships.id_user WHERE users_traineeships.id_traineeship = $idTraineeship");
    $inscrits->execute();
    $resultat = $inscrits->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function ajouterStage(){
    $addTraineeship = $this->_connection->prepare("INSERT INTO traineeships (name, date) VALUES (?, ?)");
    $addTraineeship ->execute([
      $_POST['name'],
      $_POST['start_date']
    ]);
  }

  public function modifierStage(){
    $update = $this->_connection->prepare("UPDATE traineeships SET name = ?, start_date = ?
    WHERE id = ?");
    $update->execute([
      $_POST['name'],
      $_POST['date'],
      $_POST['id']
    ]);
  }

  public function supprimerStage(){
    // supprimer dans table des stages + supprimer id dans la table de liaison
    $delete = $this->_connection->prepare("DELETE FROM traineeships WHERE id = ? ");
    $delete->execute([$_POST['id']]);

    $delete = $this->_connection->prepare("DELETE FROM users_traineeships WHERE id = ? ");
    $delete->execute([$_POST['id']]);
  }

  /********************************* Setters *****************************/
  public function setId($_id){
    $_id = (int) $_id;
    if ($_id > 0)
      $this->_id = $_id;
  }
  public function setDay($_day){
    if (is_string($_day))
      $this->_day = strtolower($_day);
  }

  public function setStartTime($_startTime){
    $_startTime = (string) $_startTime;
    $this->_startTime = $_startTime;
  }

  public function setEndTime($_endTime){
    $_endTime = (string) $_endTime;
    $this->_endTime = $_endTime;
  }
  public function setLevel($_level){
    $_level = (int) $_level;
    $this->_level = $_level;
  }
  public function setTypeDance($_typeDance){
    if (is_string($_typeDance))
      $this->_typeDance = $_typeDance;
  }
  public function setAddress($_address){
    if (is_string($_address))
      $this->_address = $_address;
  }
  public function setDescription($_description){
    if (is_string($_description))
      $this->_description = $_description;
  }

  public function setProfs($_profs){
    if (is_string($_profs))
      $this->_profs = $_profs;
  }

  public function setNamePlanning($_namePlanning){
    if (is_string($_namePlanning))
      $this->_namePlanning = $_namePlanning;
  }

  public function setIdTypeCourse($_idTypeCourse){
    $_idTypeCourse = (int) $_idTypeCourse;
    $this->_idTypeCourse = $_idTypeCourse;
  }

  /********************************* Hydratation *****************************/
  public function hydrater($donnees = null){
    if (isset($donnees['id']))
      $this->setId($donnees['id']);

    if (isset($donnees['day']))
      $this->setDay($donnees['day']);

    if (isset($donnees['start_time']))
      $this->setStartTime($donnees['start_time']);

    if (isset($donnees['end_time']))
      $this->setEndTime($donnees['end_time']);

    if (isset($donnees['level']))
      $this->setLevel($donnees['level']);

    if (isset($donnees['type_dance']))
      $this->setTypeDance($donnees['type_dance']);

    if (isset($donnees['address']))
      $this->setAddress($donnees['address']);

    if (isset($donnees['description']))
      $this->setDescription($donnees['description']);

    if (isset($donnees['profs']))
      $this->setProfs($donnees['profs']);

    if (isset($donnees['name_planning']))
      $this->setNamePlanning($donnees['name_planning']);

    if (isset($donnees['id_type_course']))
        $this->setIdTypeCourse($donnees['id_type_course']);
  }

} ?>
