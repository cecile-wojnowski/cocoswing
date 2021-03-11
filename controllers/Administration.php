<?php
class Administration extends Controller{

  /*********************************************** Messages ****************************************/
  public function messages(){
    $this->loadModel("Admin");
    $messages = $this->Admin->afficherMessages();

    $this->render("admin/messages",[
      "titlePage" => "Administration",
      "messages" => $messages
    ]);
  }

  public function deleteMessage(){
    if(isset($_POST)){
      $this->loadModel("Admin");
      $this->Admin->supprimerMessage();
      header('Location:messages');
    }
  }
  /*********************************************** Cours ****************************************/
  public function listeCours(){
    // Page affichée par défaut dans l'espace admin
    $this->loadModel("Admin");
    // On récupère tous les cours ; chaque ensemble de cours est stocké dans une clé associative
    $courses = $this->Admin->getCourses();
    // Donc pour obtenir des tableaux filtrés par type de cours,
    // on sépare les clés associatives du tableau $courses
    $solo = array_slice($courses, 0, 1); // première clé à l'exclusion de la seconde
    $lindy = array_slice($courses, 1); // seconde clé à l'exclusion de la première

    $this->render("admin/liste-cours",[
    "titlePage" => "Administration",
    "solo" => $solo,
    "lindy" => $lindy
    ]);
  }

  public function gestionDemandes($idCourse){
    // Gérer les demandes d'inscription aux cours
    $this->loadModel("Admin");
    $indifferents = $this->Admin->afficherIndifferents($idCourse);
    $leaders = $this->Admin->afficherLeaders($idCourse);
    $followers = $this->Admin->afficherFollowers($idCourse);

    $admisLeaders = $this->Admin->afficherAdmisLeaders($idCourse);
    $admisFollowers = $this->Admin->afficherAdmisFollowers($idCourse);
    $admisIndifferents = $this->Admin->afficherAdmisIndifferents($idCourse);

    if(!empty($_POST)){
      $this->Admin->accepterDemandeCours($_POST);
    }

    $this->render("admin/gestion-demandes",[
    "titlePage" => "Administration",
    "leaders" => $leaders,
    "followers" => $followers,
    "indifferents" => $indifferents,
    "admisLeaders" => $admisLeaders,
    "admisFollowers" => $admisFollowers,
    "admisIndifferents" => $admisIndifferents
    ]);
  }

  public function removeRequestCourse(){
    // Permet de refaire passer un user de la liste des admis à celle des demandes
    if(!empty($_POST)){
      $this->loadModel("Admin");
      $this->Admin->attenteDemande($_POST);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }

  public function deleteRequestCourse(){
    if(isset($_POST['id_course_request'])){
      $this->loadModel("Admin");
      $this->Admin->supprimerDemandeCours($_POST);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }

  public function addCourse(){
    // Ajouter un cours dans le planning parmi des types existants
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){
      $this->Course->hydrater($_POST);
      $this->Course->ajouterCours();
      header('Location:'.URL.'members/planning');

    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course
      ]);
    }
  }

  public function updateCourse(){
    if(!empty($_POST)){
      $this->loadModel("Course");
      $this->Course->hydrater($_POST);
      $this->Course->modifierCours();
    }
  }

  public function deleteCourse(){
    if(!empty($_POST)){
      $this->loadModel("Course");
      $this->Course->hydrater($_POST);
      $this->Course->supprimerCours();
    }
  }

  /*********************************************** Types de cours ****************************************/

  public function typesCours(){
    $this->loadModel("Course");
    $typesCourses = $this->Course->afficherTypesCours();

    if(!empty($_POST)){
      $this->loadModel("Course");
      $this->Course->ajouterTypeCours($_POST);
      header('Location:typesCours');
    }

    $this->render("admin/types-cours",[
    "titlePage" => "Administration",
    "typesCourses" => $typesCourses
    ]);
  }

  public function updateTypeCourse(){
    if(isset($_POST)){
      $this->loadModel("Course");
      $this->Course->modifierTypeCours();
      header('Location:typesCours');
    }
  }

  public function deleteTypeCourse(){
    if(isset($_POST)){
      $this->loadModel("Course");
      $this->Course->supprimerTypeCours();
      header('Location:typesCours');
    }
  }

/*********************************************** Stages ****************************************/

  public function stages(){
    $this->loadModel("Course");
    $stages = $this->Course->afficherStages();

    if(!empty($_POST)){
      $this->loadModel("Course");
      $this->Course->ajouterStage($_POST);
      header('Location:stages');
    }

    $this->render("admin/gestion-stages",[
    "titlePage" => "Administration",
    "stages" => $stages
    ]);
  }

  public function updateTraineeship(){
    if(isset($_POST)){
      var_dump($_POST);
      $this->loadModel("Course");
      $this->Course->modifierStage();
      header('Location:stages');
    }
  }

  public function deleteTraineeship(){
    if(isset($_POST)){
      $this->loadModel("Course");
      $this->Course->supprimerStage();
      header('Location:stages');
    }
  }

  public function inscritsStage($idTraineeship){
    $this->loadModel("Course");
    $inscritsStage = $this->Course->afficherInscritsStage($idTraineeship);
    $infosStage = $this->Course->getInfosTraineeship($idTraineeship);

    $this->render("admin/inscrits-stage",[
    "titlePage" => "Administration",
    "inscritsStage" => $inscritsStage,
    "infosStage" => $infosStage
    ]);
  }


  /*********************************************** Formules ****************************************/

  public function gestionFormules(){
    $this->loadModel("Subscription");
    $solo = $this->Subscription->afficherFormulesSolo();
    $lindy = $this->Subscription->afficherFormulesLindy();
    $soloLindy = $this->Subscription->afficherFormulesSoloLindy();
    $autres = $this->Subscription->afficherAutresFormules();
    $this->render("admin/gestion-formules",[
      "titlePage" => "Administration",
      "solo" => $solo,
      "lindy" => $lindy,
      "soloLindy" => $soloLindy,
      "autres" => $autres
    ]);
  }

  public function addSubscription(){
    $this->loadModel("Subscription");
    $this->Subscription->hydrater($_POST);
    $this->Subscription->ajouterFormule();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function updateSubscription(){
    $this->loadModel("Subscription");
    $this->Subscription->hydrater($_POST);
    $this->Subscription->modifierFormule();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function deleteSubscription(){
    $this->loadModel("Subscription");
    $this->Subscription->supprimerFormule();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  /*********************************************** Documents ****************************************/
  public function gestionDocuments(){
    $this->loadModel("Admin");
    $fichiers = $this->Admin->afficherFichiers();

    if(!empty($_POST)){
      $decision = "accepted";
      $this->Admin->verifierJustificatif($_POST['id_file'], $decision);
    }

    $this->render("admin/gestion-documents",[
        "titlePage" => "Administration",
        "fichiers" => $fichiers
    ]);
  }

  public function fileDenied(){
    $this->loadModel("Admin");

    if(!empty($_POST)){
      $decision = "denied";
      $this->Admin->verifierJustificatif($_POST['id_file'], $decision);
    }
  }

  /*********************************************** Gestion des membres ****************************************/

  public function gestionMembres(){
    $this->loadModel("Admin");
    $utilisateurs = $this->Admin->afficherUtilisateurs();

    if(!empty($_POST)){
      $this->Admin->modifierDroits($_POST);
    }

    $this->render("admin/gestion-membres",[
      "titlePage" => "Administration",
      "utilisateurs" => $utilisateurs
    ]);
  }

  public function searchUser(){
    if(!empty($_POST['search'])){
      $usersFound = $this->Admin->rechercherUtilisateurs($_POST['search']);
    }
    $term = $_SERVER["REQUEST_URI"];
    $term = explode("?", $term)[1];
    $term = explode("=", $term)[1];
    $this->loadModel("Admin");

    $usersFound = $this->Admin->rechercherUtilisateurs($term);

    echo json_encode($usersFound);
  }

  /*********************************************** Vidéos ****************************************/
  public function addVideo(){
    $this->loadModel("Admin");
    $videos = $this->Admin->ajouterVideo();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function updateVideo(){
    $this->loadModel("Admin");
    $videos = $this->Admin->modifierVideo();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function deleteVideo(){
    $this->loadModel("Admin");
    $videos = $this->Admin->supprimerVideo();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


  public function banUser(){
    // Bannir un utilisateur en l'empêchant de se connecter
    $this->render("admin/gestion-membres");
  }
} ?>
