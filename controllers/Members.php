<?php

class Members extends Controller{

  public function monProfil(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $this->User->hydrater(); // hydrater() applique getOne, ce qui permet de récupérer toutes les infos de l'User
    $infosUser = $this->User->objectToArray(); // Retourne un tableau associatif contenant les propriétés de l'objet User

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
      var_dump($_POST);
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
        $this->User->hydrater();
        $_SESSION["id"] = $this->User->id();
        $_SESSION['family_name'] = $this->User->familyName();
        $_SESSION['first_name'] = $this->User->firstName();
        $_SESSION['member'] = $this->User->member();
        $_SESSION['admin'] = $this->User->admin();

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

  public function addFile(){
    $dir = 'ressources/img/';
    $sourcePath = $_FILES['justificatif']['tmp_name'];
    $targetPath = $dir . $_FILES['justificatif']['name'];

    move_uploaded_file($sourcePath,$targetPath);
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

  public function joinCourse(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);

    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){

      $this->User->rejoindreCours($_POST['id']); // on envoie l'id du cours choisi par l'user

    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course
      ]);
    }
  }

  public function demandesCours(){
    // Voir la liste des demandes de participation à un cours
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $demandesCours = $this->User->afficherDemandesCours();

    if(!empty($_POST)){
      $this->User->modifierRoleDanse($_POST);
    }

    $this->render("members/demandes-cours",[
      "titlePage" => "Mon compte",
      "demandesCours" => $demandesCours
    ]);
  }

  public function historiqueAchats(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $historiqueAchats = $this->User->afficherHistorique();
    $this->render("members/historique-achats",[
      "titlePage" => "Mon compte",
      "historique" => $historiqueAchats
    ]);
  }
} ?>
