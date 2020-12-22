<?php

class Members extends Controller{
  public function index(){
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
        header('Location:index');
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
    $this->render("members/mon-profil");
  }

  public function adhesion(){
    $this->render("members/adhesion");
  }
  public function planning(){
    // Demande de participation à un cours
    // planning.php
    $this->render("members/planning");
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
