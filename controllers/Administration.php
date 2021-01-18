<?php
class Administration extends Controller{

  public function listeCours(){
    $this->loadModel("Admin");
    $courses = $this->Admin->getCourses();
    $this->render("admin/liste-cours",[
    "titlePage" => "Administration",
    "courses" => $courses
  ]);
  }

  public function gestionDemandes(){
    // Page affichée par défaut dans l'espace admin
    // Gérer les demandes d'inscription aux cours
    $this->loadModel("Admin");
    $indifferents = $this->Admin->afficherIndifferents();
    $leaders = $this->Admin->afficherLeaders();
    $followers = $this->Admin->afficherFollowers();

    $admisLeaders = $this->Admin->afficherAdmisLeaders();
    $admisFollowers = $this->Admin->afficherAdmisFollowers();
    $admisIndifferents = $this->Admin->afficherAdmisIndifferents();

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
    // Gérer les demandes d'inscription aux cours
    $this->render("admin/ajout-cours");
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

  public function gestionDocument(){
    // Vérifier les documents envoyés par les utilisateurs
    $this->render("admin/gestion-documents");
  }

  // Gestion des utilisateurs
  public function gestionMembres(){
    // Affiche la liste des personnes ayant créé un compte
    $this->loadModel("Admin");
    $utilisateurs = $this->Admin->afficherUtilisateurs();
    $this->render("admin/gestion-membres",[
      "titlePage" => "Administration",
      "utilisateurs" => $utilisateurs
    ]);
  }

  public function gestionDroits(){
    // Gérer les droits des utilisateurs
    $this->render("admin/gestion-membres");
  }

  public function banUser(){
    // Bannir un utilisateur en l'empêchant de se connecter
    $this->render("admin/gestion-membres");
  }
} ?>
