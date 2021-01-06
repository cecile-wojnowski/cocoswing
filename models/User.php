<?php
class User extends Model{
  protected $_id;
  private $_email;
  private $_firstName;
  private $_familyName;
  private $_phone;
  private $_pseudoFacebook;
  private $_password;
  private $_admin = false; // Booléen
  private $_registrationDate;
  private $_picture = 'default.jpg';
  private $_member = false;

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
      $resultat = $connexion->fetch();

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
    // Affiche l'historique d'achat

  }

  public function afficherDemandesCours(){
    $coursesRequests = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN courses
      ON courses_requests.id_course = courses.id WHERE id_user = ? ");
    $coursesRequests->execute([$this->_id]);
    $resultat = $coursesRequests->fetch();

    return $resultat;
  }

  public function rejoindreCours($id_course){

    $joinCourse = $this->_connection->prepare("INSERT INTO courses_requests
      (id_course, id_user) VALUES (?, ?)");

    $joinCourse->execute([
      $id_course,
      $this->_id]);
  }

  public function hydrater($donnees = null)
    {

      if(is_null($donnees))
        $donnees = $this->getOne();

      if (isset($donnees['id']))
        $this->_id = $donnees['id'];

      if (isset($donnees['family_name']))
        $this->_familyName = $donnees['family_name'];

      if (isset($donnees['first_name']))
        $this->_firstName = $donnees['first_name'];

      if (isset($donnees['email']))
        $this->_email = $donnees['email'];

      if (isset($donnees['phone']))
        $this->_phone = $donnees['phone'];

      if (isset($donnees['pseudo_facebook']))
        $this->_pseudoFacebook = $donnees['pseudo_facebook'];

      if (isset($donnees['registration_date']))
        $this->_registrationDate = $donnees['registration_date'];

      if (isset($donnees['password']))
        $this->_password = $donnees['password'];

      if (isset($donnees['admin']))
        $this->_admin = $donnees['admin'];

      if (isset($donnees['picture']))
        $this->_picture = $donnees['picture'];

      if (isset($donnees['member']))
        $this->_member = $donnees['member'];
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
    if ($_admin > 0)
      $this->$_admin = $_admin;
  }


 /**** Getters ***/

 public function password(){
   return $this->_password;
 }
 public function id(){
   return $this->_id;
 }
} ?>
