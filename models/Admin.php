<?php
class Admin extends Model {

  public function __construct()
  {
    $this->getConnection();
  }

  public function formatDataCoursesRequests($resultat){
    for($i = 0; $i < count($resultat); $i++) {
      $resultat[$i]['family_name'] = ucfirst($resultat[$i]['family_name']);
      $resultat[$i]['first_name'] = ucfirst($resultat[$i]['first_name']);
      $resultat[$i]['pseudo_facebook'] = ucwords($resultat[$i]['pseudo_facebook']);

      if($resultat[$i]['admin'] === 1){
        $resultat[$i]['admin'] = "Oui";
      }else{
        $resultat[$i]['admin'] = "Non";
      }

      if($resultat[$i]['member'] === 1){
        $resultat[$i]['member'] = "Oui";
      }else{
        $resultat[$i]['member'] = "Non";
      }

      if($resultat[$i]['status'] === "waiting"){
        $resultat[$i]['status'] = "En attente";

      }else if($resultat[$i]['status'] === "refused"){
        $resultat[$i]['status'] = "Demande refusée";

      }else if($resultat[$i]['status'] === "accepted"){
        $resultat[$i]['status'] = "Demande acceptée";
      }
    }
    return $resultat;
  }

  // Page gestion-demandes de participation aux cours
  public function afficherIndifferents(){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherLeaders(){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherFollowers(){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'follower' AND courses_requests.status = 'waiting' ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function accepterDemandeCours(){

    if(isset($_POST)){
      $id_course_request = $_POST['id_course_request'];
      $updateStatusCourse = $this->_connection->prepare("UPDATE courses_requests
        SET status = ? WHERE id = $id_course_request");

      $updateStatusCourse->execute(["accepted"]);
    }
  }

  public function removeRequestCourse(){
    if(isset($_POST)){
      $id_course_request = $_POST['id_course_request'];
      $updateStatusCourse = $this->_connection->prepare("UPDATE courses_requests
        SET status = ? WHERE id = $id_course_request");

      $updateStatusCourse->execute(["waiting"]);
    }
  }

  public function supprimerDemandeCours(){
    $id_course_request = $_POST['id_course_request'];
    $updateStatusCourse = $this->_connection->prepare("DELETE FROM courses_requests WHERE id = $id_course_request");
    $updateStatusCourse->execute();
  }

  public function afficherAdmisLeaders(){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader' AND courses_requests.status = 'accepted' ");
    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherAdmisFollowers(){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'follower' AND courses_requests.status = 'accepted' ");
    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherAdmisIndifferents(){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent' AND courses_requests.status = 'accepted' ");
    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }


  // Page gestion-membres
  public function afficherUtilisateurs(){
    // Permet de voir tous les utilisateurs inscrits sur le site
    // Il faudrait proposer une barre de recherche pour faciliter la navigation
    // Ainsi qu'une pagination
    $utilisateurs = $this->_connection->prepare("SELECT * FROM users");
    $utilisateurs->execute();
    $resultat = $utilisateurs->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      $resultat[$i]['family_name'] = ucfirst($resultat[$i]['family_name']);
      $resultat[$i]['first_name'] = ucfirst($resultat[$i]['first_name']);
      $resultat[$i]['pseudo_facebook'] = ucwords($resultat[$i]['pseudo_facebook']);

      if($resultat[$i]['admin'] === 1){
        $resultat[$i]['admin'] = "Oui";
      }else{
        $resultat[$i]['admin'] = "Non";
      }

      if($resultat[$i]['member'] === 1){
        $resultat[$i]['member'] = "Oui";
      }else{
        $resultat[$i]['member'] = "Non";
      }
    }

    return $resultat;
  }

  // Gestion des formules
  public function formatFormules($resultat){
    for($i = 0; $i < count($resultat); $i++) {
      if($resultat[$i]['lower_price'] === 1){
        $resultat[$i]['lower_price'] = "Oui";
      }else{
        $resultat[$i]['lower_price'] = "Non";
      }

      if($resultat[$i]['installment_payment'] === 1){
        $resultat[$i]['installment_payment'] = "Oui";
      }else{
        $resultat[$i]['installment_payment'] = "Non";
      }
    }
  }

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

}
 ?>
