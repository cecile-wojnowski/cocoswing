<?php
class Admin extends Model {

  public function __construct()
  {
    $this->getConnection();
  }

  public function getCourses(){ // Affiche la liste des cours contenant au moins une demande
    $coursSolo = $this->_connection->prepare("SELECT * FROM courses_requests
      INNER JOIN courses ON  courses_requests.id_course = courses.id
      WHERE courses.type_dance = 'solo' ");
    $coursSolo->execute();
    $resultSolo = $coursSolo->fetchAll(PDO::FETCH_ASSOC);

    $coursLindy = $this->_connection->prepare("SELECT * FROM courses_requests
      INNER JOIN courses ON  courses_requests.id_course = courses.id
      WHERE courses.type_dance = 'lindy_hop' ");
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

  /*********************************************** Demandes ****************************************/
    /************* Demandes en attente ****************/
  public function afficherIndifferents($idCourse){
    $demandesCours = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'indifferent'
      AND courses_requests.status = 'waiting'
      AND courses_requests.id_course = $idCourse ");
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
      AND courses_requests.id_course = $idCourse");
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
      AND courses_requests.id_course = $idCourse ");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }
  /************* Gestion des demandes ****************/

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

  /************* Demandes acceptées ****************/

  public function afficherAdmisLeaders($idCourse){
    $admis = $this->_connection->prepare("SELECT * FROM users INNER JOIN courses_requests
      ON courses_requests.id_user = users.id
      WHERE courses_requests.role_dance = 'leader'
      AND courses_requests.status = 'accepted'
      AND courses_requests.id_course = $idCourse ");

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
      AND courses_requests.id_course = $idCourse ");

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
      AND courses_requests.id_course = $idCourse ");

    $admis->execute();
    $resultat = $admis->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatDataCoursesRequests($resultat);

    return $resultat;
  }

  /*********************************************** Membres ****************************************/
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

  /*********************************************** Documents ****************************************/

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

  /*********************************************** Messages ****************************************/

  public function afficherMessages(){
    $messages = $this->_connection->prepare("SELECT * FROM messages");
    $messages->execute();
    $resultat = $messages->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
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

  /*********************************************** Vidéos ****************************************/

  public function ajouterVideo(){
    $ajoutVideo = $this->_connection->prepare("INSERT INTO videos (name, url) VALUES (?, ?)");

    $ajoutVideo->execute([
      $_POST['name'],
      $_POST['url']
    ]);
  }

  public function modifierVideo(){
    $updateVideo = $this->_connection->prepare("UPDATE videos SET name = ?, url = ? WHERE id = ?");

    $updateVideo->execute([
      $_POST['name'],
      $_POST['url'],
      $_POST['id']
    ]);
  }

  public function supprimerVideo(){
    $deleteVideo = $this->_connection->prepare("DELETE FROM videos WHERE id = ?");

    $deleteVideo->execute([
      $_POST['id']
    ]);
  }

  public function bannirUtilisateur(){
    // Empêche la connexion d'un utilisateur en lui affichant un message spécifique ?
  }

}
 ?>
