<?php
class Members extends Controller{
  public function index(){
    $this->render("members/mon-profil");
  }

  public function inscription(){
    $this->render("members/inscription");
  }
  public function connexion(){
    $this->render("members/connexion");
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
