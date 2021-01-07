<?php
class Admin extends Controller{
  public function index(){
    // View: admin - Page d'accueil de l'administration : contiendrait le sommaire des différentes pages
    $this->loadModel("Administration");
    $this->render("admin/admin");
  }
  public function gestionDemandes(){
    // Gérer les demandes d'inscription aux cours
    $this->render("admin/gestion-demandes");
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
