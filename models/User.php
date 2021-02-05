<?php
class User extends Model{
  protected $_id;
  private $_email;
  private $_firstName;
  private $_familyName;
  private $_phone;
  private $_pseudoFacebook;
  private $_password;
  private $_admin = 0; // Booléen
  private $_registrationDate;
  private $_picture = 'default.jpg';
  private $_member = 0;

  public function __construct()
  {
    // Nous définissons la table par défaut de ce modèle
    $this->table = "users";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
  }

  public function creerCompte(){

    $inscription = $this->_connection->prepare("INSERT INTO users
      (email, first_name, family_name, phone, pseudo_facebook, password, picture)
      VALUES (?, ?, ?, ?, ?, ?, ?)");

    $inscription->execute([
      $this->_email,
      $this->_firstName,
      $this->_familyName,
      $this->_phone,
      $this->_pseudoFacebook,
      password_hash($this->_password, PASSWORD_BCRYPT),
      $this->_picture
    ]);

    $this->_id = $this->_connection->lastInsertId();
  }

    public function seConnecter(){

      $connexion = $this->_connection->prepare("SELECT * FROM users WHERE email = ? ");
      $connexion->execute([$this->_email]);
      $resultat = $connexion->fetch(PDO::FETCH_ASSOC);

      if($resultat){
        if(password_verify($this->_password, $resultat['password'])) {
          $this->_id = $resultat['id'];
          return true;
        } else {
          return false;
        }
      }else{
        return false;
      }

    }

    public function seDeconnecter(){
      if(isset($_SESSION)){
        session_destroy();
        return true;
      }
    }

  public function modifierInfos(){
    $update = $this->_connection->prepare("UPDATE users
      SET email = ?,
        first_name = ?,
        family_name = ?,
        phone = ?,
        pseudo_facebook = ?,
        password = ?
      WHERE id = $this->_id");

      $update->execute([
        $this->_email,
        $this->_firstName,
        $this->_familyName,
        $this->_phone,
        $this->_pseudoFacebook,
        password_hash($this->_password, PASSWORD_BCRYPT)
      ]);
  }

  public function afficherHistorique(){
    $historique_achats = $this->_connection->prepare("SELECT * FROM subscriptions INNER JOIN users_subscriptions
      ON subscriptions.id = users_subscriptions.id_subscription WHERE users_subscriptions.id_user = ? ");
    $historique_achats->execute([$this->_id]);
    $resultat = $historique_achats->fetchAll(PDO::FETCH_ASSOC);

    // Mise en forme des résultats
    for($i = 0; $i < count($resultat); $i++) {

      // Permet d'afficher 2021 -2022 par exemple
      $yearPlusOne = (int) $resultat[$i]['year'] + 1;
      $year = new Datetime($resultat[$i]['year']);
      $resultat[$i]['year'] = $year->format('Y') ."-". $yearPlusOne;
    }
    return $resultat;
  }

  public function rejoindreCours($id_course){

    $joinCourse = $this->_connection->prepare("INSERT INTO courses_requests
      (id_course, id_user) VALUES (?, ?)");

    $joinCourse->execute([
      $id_course,
      $this->_id]);
  }

  public function afficherDemandesCours(){
    $coursesRequests = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN courses
      ON courses_requests.id_course = courses.id WHERE id_user = ? ");
    $coursesRequests->execute([$this->_id]);
    $resultat = $coursesRequests->fetchAll(PDO::FETCH_ASSOC);

    // Mise en forme des résultats
    for($i = 0; $i < count($resultat); $i++) {

      $resultat[$i]["type_dance"] = ucfirst(str_replace("_", " ", $resultat[$i]['type_dance'])); // Affiche Lindy hop au lieu de lindy_hop
      $resultat[$i]["day"] = ucfirst($resultat[$i]["day"]); // Première lettre en majuscule
      $resultat[$i]["address"] = ucfirst($resultat[$i]["address"]);

      $start_time_format = new Datetime($resultat[$i]['start_time']); // Mise en forme des horaires
      $resultat[$i]['start_time'] = $start_time_format->format('H:i');
      $end_time_format = new Datetime($resultat[$i]['end_time']);
      $resultat[$i]['end_time'] = $end_time_format->format('H:i');

      if($resultat[$i]["status"] === "accepted")
        $resultat[$i]["status"] = "Demande acceptée";

      if($resultat[$i]["status"] === "waiting")
        $resultat[$i]["status"] = "En attente";

      if($resultat[$i]["role_dance"] === "indifferent")
        $resultat[$i]["role_dance"] = "Indifférent";
    }
    return $resultat;
  }

  public function modifierRoleDanse(){
    $updateRole = $this->_connection->prepare("UPDATE courses_requests
      SET role_dance = ? WHERE id_user = ? AND id_course = ?");

    $updateRole->execute([
      $_POST['role_dance'],
      $this->_id,
      $_POST['id']
    ]);
  }

  public function ajouterFichier($filename){
    $ajoutFichier = $this->_connection->prepare("INSERT INTO files (filename, id_user) VALUES (?, ?)");

    $ajoutFichier->execute([
      $filename,
      $this->_id
    ]);
  }

  public function changerFichier(){
    $changeFile = $this->_connection->prepare("UPDATE file SET filename = ? WHERE id_user = ? AND id = ?");

    $updateRole->execute([
      $this->_id,
      $idFile
    ]);
  }

  public function afficherFichiers(){
    $files = $this->_connection->prepare("SELECT * FROM files  WHERE id_user = ? ");
    $files->execute([$this->_id]);
    $resultat = $files->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      if($resultat[$i]["status"] === "accepted")
        $resultat[$i]["status"] = "Fichier accepté";

      if($resultat[$i]["status"] === "waiting")
        $resultat[$i]["status"] = "En attente";

        if($resultat[$i]["status"] === "denied")
          $resultat[$i]["status"] = "Fichier refusé";
    }
    return $resultat;
  }

  public function hydrater($donnees = null)
    {
      if(is_null($donnees))
        $donnees = $this->getOne();

      if (isset($donnees['id']))
        $this->setId($donnees['id']);

      if (isset($donnees['family_name']))
        $this->setFamilyName($donnees['family_name']);

      if (isset($donnees['first_name']))
        $this->setFirstName($donnees['first_name']);

      if (isset($donnees['email']))
        $this->setEmail($donnees['email']);

      if (isset($donnees['phone']))
        $this->setPhone($donnees['phone']);

      if (isset($donnees['pseudo_facebook']))
        $this->setPseudoFacebook($donnees['pseudo_facebook']);

      if (isset($donnees['registration_date']))
        $this->setRegistrationDate($donnees['registration_date']);

      if (isset($donnees['password']))
        $this->setPassword($donnees['password']);

      if (isset($donnees['admin']))
        $this->setAdmin($donnees['admin']);

      if (isset($donnees['picture']))
        $this->setPicture($donnees['picture']);

      if (isset($donnees['member']))
        $this->setMember($donnees['member']);
    }

    public function objectToArray() {
      /* Appliquer get_object_vars en dehors de la classe ne fonctionne pas
       car les attributs sont privés */
      return get_object_vars($this);
    }

  /***************** Setters *******************/

  public function setId($_id){
    $_id = (int) $_id;
    if ($_id > 0)
      $this->_id = $_id;
  }
 public function setEmail($_email){
    if (is_string($_email))
      $this->_email = $_email;
 }
  public function setFamilyName($_familyName){
    if (is_string($_familyName))
      $this->_familyName = $_familyName;
  }
  public function setFirstName($_firstName){
    if (is_string($_firstName))
      $this->_firstName = $_firstName;
  }

  public function setPhone($_phone){
    $_phone = (int) $_phone;
    $this->_phone = $_phone;
  }

  public function setPseudoFacebook($_pseudoFacebook){
    if (is_string($_pseudoFacebook))
      $this->_pseudoFacebook = $_pseudoFacebook;
  }
  public function setPassword($_password){
    if (is_string($_password))
      $this->_password = $_password;
  }
  public function setAdmin($_admin){
    $_admin = (int) $_admin;
    $this->_admin = $_admin;
  }
  public function setRegistrationDate($_registrationDate){
    //$_registrationDate = (int) $_registrationDate;
    if ($_registrationDate > 0)
      $this->_registrationDate = $_registrationDate;
  }
  public function setPicture($_picture){
    if (is_string($_picture))
      $this->_picture = $_picture;
  }
  public function setMember($_member){
    $_member = (int) $_member;
    $this->_member = $_member;
  }


 /**** Getters ***/

 public function password(){
   return $this->_password;
 }

 public function id(){
   return $this->_id;
 }

 public function familyName(){
   return $this->_familyName;
 }

 public function firstName(){
   return $this->_firstName;
 }

 public function member(){
   return $this->_member;
 }

 public function admin(){
   return $this->_admin;
 }
} ?>
