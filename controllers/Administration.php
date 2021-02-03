<?php
class Administration extends Controller{

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

  public function typesCours(){
    $this->loadModel("Course");
    $typesCourses = $this->Course->afficherTypesCours();

    $this->render("admin/types-cours",[
    "titlePage" => "Administration",
    "typesCourses" => $typesCourses
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
      $this->Admin->removeRequestCourse($_POST);
      header('Location: gestionDemandes');
    }
  }

  public function deleteRequestCourse(){
    if(isset($_POST['id_course_request'])){
      $this->loadModel("Admin");
      $this->Admin->supprimerDemandeCours($_POST);
      header('Location: gestionDemandes');
    }
  }

  public function creerNouveauCours(){
    // Créer un tout nouveau cours
    $this->render("admin/ajout-cours");
  }

  // Page planning
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

  public function deleteCourse(){
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){
      $this->Course->hydrater($_POST);
      $this->Course->supprimerCours();

    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course
      ]);
    }
  }

  public function gestionFormules(){
    $this->loadModel("Admin");
    $solo = $this->Admin->afficherFormulesSolo();
    $lindy = $this->Admin->afficherFormulesLindy();
    $soloLindy = $this->Admin->afficherFormulesSoloLindy();
    $this->render("admin/gestion-formules",[
      "titlePage" => "Administration",
      "solo" => $solo,
      "lindy" => $lindy,
      "soloLindy" => $soloLindy
    ]);
  }

  public function gestionDocuments(){
    // Vérifier les documents envoyés par les utilisateurs
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

  // Gestion des utilisateurs
  public function gestionMembres(){
    // Affiche la liste des personnes ayant créé un compte
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


  public function banUser(){
    // Bannir un utilisateur en l'empêchant de se connecter
    $this->render("admin/gestion-membres");
  }
} ?>
