<?php

class Members extends Controller{
  public function monProfil(){
    $this->loadModel("User");
    // On fait passer l'id stocké en session dans l'attribut id de User
    $this->User->setId($_SESSION['id']);

    // hydrater() applique getOne, ce qui permet de récupérer toutes les infos de l'User
    $this->User->hydrater();

    // Retourne un tableau associatif contenant les propriétés de l'objet User
    $infosUser = $this->User->objectToArray();

    // On envoie le tableau dans la vue
    $this->render("members/mon-profil",[
      "titlePage" => "Mon compte",
      "infosUser" => $infosUser
    ]);
  }

  public function updateProfile(){
    if(isset($_POST)){
      $this->loadModel("User");
      $this->User->setId($_SESSION['id']);
      $this->User->hydrater($_POST);
      $this->User->modifierInfos();
      header('Location:monProfil');
    }
  }

  public function inscription(){
    if(isset($_POST["email"])) {
      $this->loadModel("User");
      $this->User->hydrater($_POST);
      $this->User->creerCompte();
      header("Location:connexion");

    } else {
      $this->render("members/inscription", [
        "titlePage" => "S'inscrire",
        "title" => "S'inscrire"
      ]);
    }
  }

  public function connexion(){
    if(isset($_POST["email"])){
      $this->loadModel("User");
      $this->User->hydrater($_POST);

      if($this->User->seConnecter()) {
        $_SESSION["id"] = $this->User->id();
        header('Location:monProfil');
      } else {
        echo "Vous n'êtes pas identifié.";
      }
    }else{
      $this->render("members/connexion", [
        "titlePage" => "Se connecter",
        "title" => "Se connecter"
      ]);
    }
  }

  public function deconnexion(){
    $this->loadModel("User");
    if($this->User->seDeconnecter()){
      header('Location:../website');
    }
  }

  public function adhesion(){
    if(!empty($_POST)){
      $this->loadModel("User");
      $this->loadModel("Subscription");
      $this->User->setId($_SESSION['id']);
      $helloAsso = $this->Subscription->choisirFormule($_POST);
      $this->render("members/adhesion",[
        "titlePage" => "Mon compte",
        "helloAsso" => $helloAsso
      ]);
    }else{
      $this->render("members/adhesion",[
        "titlePage" => "Mon compte"
      ]);
    }
  }

  public function planning(){
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){
      var_dump($_POST);
      $this->Course->hydrater($_POST);
      $this->Course->modifierCours();
      header('Location:planning');

    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course,
        "admin" => 1
      ]);
    }
  }

  public function addCourse(){
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){
      $this->Course->hydrater($_POST);
      $this->Course->ajouterCours();

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

  public function joinCourse(){
    $this->loadModel("User");
    $this->loadModel("Course");

    $course = $this->Course->recupererCours();
    $this->User->setId($_SESSION['id']);

    if(!empty($_POST)){

      var_dump($_POST);

      $this->User->rejoindreCours();

    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course
      ]);
    }
  }

  public function historiqueAchats(){
    // Historique d'achat de l'utilisateur
    $this->render("members/historique-achats");
  }

  public function demandesCours(){
    // Voir la liste des demandes de participation à un cours
    $this->render("members/demandes-cours",[
      "titlePage" => "Mon compte"
    ]);
  }
} ?>
