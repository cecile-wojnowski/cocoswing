<?php
class Admin extends Model {

  public function __construct()
  {
    $this->getConnection();
  }

  public function getCourses(){
    $coursSolo = $this->_connection->prepare("SELECT * FROM courses WHERE type_dance = 'solo' ");
    $coursSolo->execute();
    $resultSolo = $coursSolo->fetchAll(PDO::FETCH_ASSOC);

    $coursLindy = $this->_connection->prepare("SELECT * FROM courses WHERE type_dance = 'lindy_hop' ");
    $coursLindy->execute();
    $resultLindy = $coursLindy->fetchAll(PDO::FETCH_ASSOC);

    $resultats = ["solo" => $resultSolo, "lindy" => $resultLindy];

    return $resultats;
  }

  public function formatDataCoursesRequests($resultat){
    for($i = 0; $i < count($resultat); $i++) {
      $resultat[$i]['family_name'] = ucfirst($resultat[$i]['family_name']);
      $resultat[$i]['first_name'] = ucfirst($resultat[$i]['first_name']);
      $resultat[$i]['pseudo_facebook'] = ucwords($resultat[$i]['pseudo_facebook']);

      if($resultat[$i]['admin'] == 1){
        $resultat[$i]['admin'] = "Oui";
      }else{
        $resultat[$i]['admin'] = "Non";
      }

      if($resultat[$i]['member'] == 1){
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
  public function afficherIndifferents($idCourse){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent'
      AND courses_requests.status = 'waiting'
      AND courses_requests.id = $idCourse ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherLeaders($idCourse){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader'
      AND courses_requests.status = 'waiting'
      AND courses_requests.id = $idCourse ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherFollowers($idCourse){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'follower'
      AND courses_requests.status = 'waiting'
      AND courses_requests.id = $idCourse ");
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

  public function afficherAdmisLeaders($idCourse){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader'
      AND courses_requests.status = 'accepted'
      AND courses_requests.id = $idCourse ");

    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherAdmisFollowers($idCourse){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'follower'
      AND courses_requests.status = 'accepted'
      AND courses_requests.id = $idCourse ");

    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  public function afficherAdmisIndifferents($idCourse){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent'
      AND courses_requests.status = 'accepted'
      AND courses_requests.id = $idCourse ");

    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }


  // Page gestion-membres
  public function rechercherUtilisateurs($data){

    $searchUsers = $this->_connection->prepare("SELECT first_name, family_name FROM users
      WHERE first_name OR family_name LIKE '%$data%'");
    $searchUsers->execute();
    $resultat = $searchUsers->fetchAll(PDO::FETCH_ASSOC);

    $arrayResults = [];
    for($i = 0; $i < count($resultat); $i++) {
      $arrayResults = [$resultat[$i]['first_name'], $resultat[$i]['family_name']];
    }

    return $arrayResults;
  }
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
      $formatDate = new Datetime($resultat[$i]['registration_date']);
      $resultat[$i]['registration_date']= $formatDate->format('d/m/Y');

      if($resultat[$i]['admin'] == 1){
        $resultat[$i]['admin'] = "Oui";
      }else{
        $resultat[$i]['admin'] = "Non";
      }

      if($resultat[$i]['member'] == 1){
        $resultat[$i]['member'] = "Oui";
      }else{
        $resultat[$i]['member'] = "Non";
      }
    }

    return $resultat;
  }

  public function modifierDroits(){
    $updateAdmin = $this->_connection->prepare("UPDATE users SET admin = ? WHERE id = ?");

    $updateAdmin->execute([
      $_POST['admin'],
      $_POST['id']
    ]);
  }

  // Gestion des formules
  public function formatFormules($resultat){
    for($i = 0; $i < count($resultat); $i++) {
      if($resultat[$i]['lower_price'] == 1){
        $resultat[$i]['lower_price'] = "Oui";
      }else{
        $resultat[$i]['lower_price'] = "Non";
      }

      if($resultat[$i]['installment_payment'] == 1){
        $resultat[$i]['installment_payment'] = "Oui";
      }else{
        $resultat[$i]['installment_payment'] = "Non";
      }

      $resultat[$i]['price'] = $resultat[$i]['price'] . " " . "euros";

      $year = new Datetime($resultat[$i]['year']);
      $resultat[$i]['year'] = $year->format('Y');
    }
    return $resultat;
  }

  public function afficherFormulesSolo(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%solo' AND type_dance NOT LIKE '%lindy%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  public function afficherFormulesLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy' AND type_dance NOT LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  public function afficherFormulesSoloLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy%' AND type_dance LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  // Page gestion-documents
  public function afficherFichiers(){ // Affiche les documents envoyés par les utilisateurs
    $files = $this->_connection->prepare("SELECT * FROM users INNER JOIN files
      ON files.id_user = users.id WHERE files.status = 'waiting' ");
    $files->execute();
    $resultat = $files->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < count($resultat); $i++) {
      $resultat[$i]["family_name"] = ucfirst($resultat[$i]["family_name"]);
      $resultat[$i]["first_name"] = ucfirst($resultat[$i]["first_name"]);

      if($resultat[$i]["status"] === "accepted")
        $resultat[$i]["status"] = "Fichier accepté";

      if($resultat[$i]["status"] === "waiting")
        $resultat[$i]["status"] = "En attente";

        if($resultat[$i]["status"] === "denied")
          $resultat[$i]["status"] = "Fichier refusé";
    }
    return $resultat;
  }
  public function verifierJustificatif($idFile, $decision){
    // Valide ou refuse les fichiers transmis par les utilisateurs
    $updateAdmin = $this->_connection->prepare("UPDATE files SET status = ? WHERE id = ?");

    $updateAdmin->execute([
      $decision,
      $idFile
    ]);
  }

  public function insererMessage(){
    $insertionMessage = $this->_connection->prepare("INSERT INTO messages
      (family_name, first_name, email, message, reception_date)
      VALUES (?, ?, ?, ?, NOW())");

    $insertionMessage->execute([
      $_POST['family_name'],
      $_POST['first_name'],
      $_POST['email'],
      $_POST['message']
    ]);
  }

  public function bannirUtilisateur(){
    // Empêche la connexion d'un utilisateur en lui affichant un message spécifique ?
  }

}
 ?>
