<?php
class Administration extends Controller{

  public function gestionDemandes(){
    // Page affichée par défaut dans l'espace admin
    // Gérer les demandes d'inscription aux cours
    $this->loadModel("Admin");
    $this->Admin->afficherDemandesCours();
    $this->render("admin/gestion-demandes",[
    "titlePage" => "Administration"
    ]);
  }

  public function creerNouveauCours(){
    // Gérer les demandes d'inscription aux cours
    $this->render("admin/ajout-cours");
  }

  public function gestionFormules(){
    // Gérer les formules
    $this->render("admin/gestion-formules");
  }

  public function gestionDocument(){
    // Vérifier les documents envoyés par les utilisateurs
    $this->render("admin/gestion-documents");
  }

  public function gestionMembres(){
    // Affiche la liste des membres inscrits
    $this->render("admin/gestion-membres");
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
