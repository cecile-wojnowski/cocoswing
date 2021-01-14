<?php
class Admin extends Model {

  public function __construct()
{
  $this->getConnection();
}

  // Page gestion-demandes de participation aux cours
  public function afficherIndifferents(){
    // Affiche la liste des demandes d'inscription à un cours
    $demandesCours = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN users
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function afficherLeaders(){
    // Affiche la liste des demandes d'inscription à un cours
    $demandesCours = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN users
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }
  public function afficherFollowers(){
    // Affiche la liste des demandes d'inscription à un cours
    $demandesCours = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN users
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'follower' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function accepterDemande(){

    if(isset($_POST)){
      $id_course_request = $_POST['id_course_request'];
      $updateStatusCourse = $this->_connection->prepare("UPDATE courses_requests
        SET status = ? WHERE id = $id_course_request");

      $updateStatusCourse->execute(["accepted"]);
    }
  }

  public function afficherAdmis(){

  }

  // Page gestion-membres
  public function afficherUtilisateurs(){
    // Permet de voir tous les utilisateurs inscrits sur le site
    // Il faudrait proposer une barre de recherche pour faciliter la navigation
    // Ainsi qu'une pagination
    $utilisateurs = $this->_connection->prepare("SELECT * FROM users");
    $utilisateurs->execute();
    $resultat = $utilisateurs->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  // Gestion des formules
  public function afficherFormulesSolo(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%solo' AND type_dance NOT LIKE '%lindy%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function afficherFormulesLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy' AND type_dance NOT LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function afficherFormulesSoloLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy%' AND type_dance LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
  }

  public function verifierJustificatif(){
    // Valide ou refuse l'inscription d'un utilisateur
  }



  public function modifierUtilisateur(){
    // L'admin a la possibilité de modifier les informations des membres ?
  }

  public function bannirUtilisateur(){
    // Empêche la connexion d'un utilisateur en lui affichant un message spécifique ?
  }



  public function accepterDemandeCours(){

  }

  public function refuserDemandeCours(){

  }

}
 ?>
