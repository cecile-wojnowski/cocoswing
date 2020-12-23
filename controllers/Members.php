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
      "title" => "Mon compte",
      "infosUser" => $infosUser
    ]);
  }

  public function inscription(){
    if(isset($_POST["email"])) {
      $this->loadModel("User");
      $this->User->hydrater($_POST);
      $this->User->creerCompte();
      header("Location:connexion");

    } else {
      $this->render("members/inscription", [
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
        echo "Pas identifié";
      }
    }else{
      $this->render("members/connexion", [
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

  public function updateProfile(){
    if(isset($_POST)){
      $this->loadModel("User");
      $this->User->setId($_SESSION['id']);
      $this->User->hydrater($_POST);
      $this->User->modifierInfos();
      header('Location:monprofil');
    }
  }

  public function adhesion(){
    if(isset($_POST)){
      $this->loadModel("User");
      $this->loadModel("Subscription");
      $this->User->setId($_SESSION['id']);
    }else{
      $this->render("members/adhesion",[
        "title" => "Mon compte"
      ]);
  }
  }

  public function planning(){
    // Demande de participation à un cours
    $this->loadModel("Course");
    $allCourses = $this->Course->getAll();
    $this->render("members/planning",[
      "title" => "Mon compte",
      "allCourses" => $allCourses
    ]);
  }
  public function historiqueAchats(){
    // Historique d'achat de l'utilisateur
    $this->render("members/historique-achats");
  }
  public function demandesCours(){
    // Voir la liste des demandes de participation à un cours
    $this->render("members/demandes-cours");
  }
} ?>
