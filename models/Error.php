<?php
class Error extends Model{
  protected $_bdd;
  protected $_id;
  protected $_typeErreur;
  protected $_messageErreur;

  public function __construct(){
    $this->table = "errors";
    $this->getConnection();
  }

  /* Erreurs à ajouter :
  - unknown email : comparer l'e-mail entré et ceux stockés en bdd
  - wrong password
  - format_phone : le numéro de tel ne doit contenir que des chiffres */

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

  }

  public function verifierInscription(){

    if(empty($_POST['email'])){
      $empty = "empty_email";
      $this->afficherErreur($empty);

    }elseif(empty($_POST['name']))
    {
      $empty = "empty_name";
      $this->afficherErreur($empty);

    }elseif(empty($_POST['family_name']))
    {
      $empty = "empty_family_name";
      $this->afficherErreur($empty);

    }elseif(empty($_POST['password']))
    {
      $empty = "empty_password";
      $this->afficherErreur($empty);

    }elseif(empty($_POST['confirm_password']))
    {
      $empty = "empty_confirm";
      $this->afficherErreur($empty);

    }elseif(empty($_POST['email']))
    {
      $empty = "empty_email";
      $this->afficherErreur($empty);

    }elseif($_POST['password'] != $_POST['confirm_password']) // Vérifie que les deux mots de passe sont identiques
    {
      $error = "error_password";
      $this->afficherErreur($error);

    }elseif(strlen($_POST['password']) < 8) // Impose une taille minimale au password
    {
      $short = "short_password";
      $this->afficherErreur($short);

    }elseif(strlen($_POST['phone']) == 10)
    {
      $sizePhone = "size_phone";
      $this->afficherErreur($sizePhone);

    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
      $format = "format_email";
      $this->afficherErreur($format);

    }elseif($_POST['email'])
    {
      $email = $this->verifierNombreEmail($_POST['email']);

      if($email = true){
        $emailIndisponible = "email_not_available";
        $this->afficherErreur($emailIndisponible);
      }
    }
  }

  public function verifierConnexion(){

    if(empty($_POST['email'])){
      $empty = "empty_email";
      $this->afficherErreur($empty);

    }elseif($_POST['email'])
    {
      $email = $this->verifierNombreEmail($_POST['email']);

      if($email = false){
        $emailInconnu = "unknown_email";
        $this->afficherErreur($emailInconnu);
      }
    }elseif($_POST['password'] != $_POST['confirm_password'])
    {
      $error = "error_password";
      $this->afficherErreur($error);
    }
  }

  public function afficherErreur($typeErreur){
    $get_error = $this->_connection->prepare("SELECT * FROM erreurs WHERE type_erreur = '$typeErreur' ");
    $get_error->execute();
    $resultat = $get_error->fetch();

    echo $resultat['message_erreur'];
  }

} ?>
