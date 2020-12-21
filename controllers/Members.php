<?php

class Members extends Controller{
  public function index(){
    $this->loadModel("User");
    // Mettre l'id de session dans la propriété _id de $this->User (avec un setter)

    // Utiliser la méthode getOne pour stocker les données dans un tableau

    // hydrater l'objet avec ce tableau

    // envoyer l'objet dans la vue
    $this->render("members/mon-profil",[
      "title" => "Mon compte"
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
