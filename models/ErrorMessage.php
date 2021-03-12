<?php
class ErrorMessage extends Model{
  protected $_id;
  protected $_typeErreur;
  protected $_messageErreur;

  public function __construct(){
    $this->table = "errors";
    $this->getConnection();
  }

  public function verifierNombreEmail(){
    $getEmail = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ? ");
    $getEmail->execute([$_POST['email']]);

    $resultat = $getEmail->fetchColumn();

    if($resultat == 0){
      return false;
    }else{
      return true;
    }
  }

  public function verifierPassword(){
    // Le password entré doit déjà être crypté pour être comparé
    // Suffit-il de les comparer cryptés ou bien faut-il utiliser des fonctions spécifiques ?
    $getPassword = $bdd->prepare("SELECT * FROM utilisateurs WHERE password = ? ");
    $getPassword->execute([$_POST['password']]);

    $resultat = $getPassword->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $resultat['password'])) {
      return true;
    } else {
      return false;
    }
  }

  public function verifierInscription(){
    $erreurs = [];

    if(empty($_POST['email'])){
      $empty = "empty_email";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if(empty($_POST['first_name'])){
      $empty = "empty_name";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if(empty($_POST['family_name'])){
      $empty = "empty_family_name";
      $erreurs[] = $this->recupererErreur($empty);

    }if(empty($_POST['password'])){
      $empty = "empty_password";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if(empty($_POST['confirm_password'])){
      $empty = "empty_confirm";
      $erreurs[] = $this->recupererErreur($empty);

    }
    if(empty($_POST['email'])){
      $empty = "empty_email";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if($_POST['password'] != $_POST['confirm_password']){
      $error = "error_password";
      $erreurs[] = $this->recupererErreur($error);

    }

    if(strlen($_POST['password']) < 8){
      $short = "short_password";
      $erreurs[] = $this->recupererErreur($short);
    }

    if(!empty($_POST['phone']))
    {
      if(is_int($_POST['phone']) == true){
        if(strlen($_POST['phone']) < 10 OR strlen($_POST['phone']) > 10){
          $sizePhone = "size_phone";
          $erreurs[] = $this->recupererErreur($sizePhone);
        }
      }
      if(is_int($_POST['phone']) == false){
        $formatPhone = "format_phone";
        $erreurs[] = $this->recupererErreur($formatPhone);
      }
    }

      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $format = "format_email";
      $erreurs[] = $this->recupererErreur($format);
    }

    if($_POST['email'])
    {
      $email = $this->verifierNombreEmail($_POST['email']);
      if($email = true){
        $emailIndisponible = "email_not_available";
        $erreurs[] = $this->recupererErreur($emailIndisponible);
      }
    }

    return $erreurs;
  }

  public function verifierConnexion(){
    $erreurs = [];

    if(empty($_POST['email'])){
      $empty = "empty_email";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if($_POST['email']){
      $email = $this->verifierNombreEmail($_POST['email']);
      if($email = false){
        $emailInconnu = "unknown_email";
        $erreurs[] = $this->recupererErreur($emailInconnu);
      }
    }

    if(empty($_POST['password'])){
      $empty = "empty_password";
      $erreurs[] = $this->recupererErreur($empty);
    }

    if($_POST['password'])
    {
      $password = $this->verifierPassword($_POST['password']);
      if($password = false){
        $wrongPassword = "wrong_password";
        $erreurs[] = $this->recupererErreur($wrongPassword);
      }
    }

    return $erreurs;
  }

  public function recupererErreur($typeErreur){
    $getError = $this->_connection->prepare("SELECT * FROM errors WHERE type_error = ? ");
    $getError->execute([$typeErreur]);
    $resultat = $getError->fetch(PDO::FETCH_ASSOC);

    return $resultat['message_error'];
  }

} ?>
