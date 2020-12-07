<?php
class Admin extends Controller{
  public function index(){
    // View: admin.php - Page d'accueil de l'administration : contiendrait le sommaire des différentes pages
  }
  public function manageCourseRequest(){
    // Gérer les demandes d'inscription aux cours

    $this->render("admin/gestion-demandes");
  }
  public function manageSubscriptions(){
    // Gérer les formules

    // manage_subscriptions.php
    $this->render("admin/gestion-formules");
  }

  public function checkDocument(){
    // Vérifier les documents envoyés par les utilisateurs

    // manage_documents.php
    $this->render("admin/gestion-documents");
  }

  public function getUsers(){
    // Affiche la liste des membres inscrits

    // manage_users.php
    $this->render("admin/gestion-membres");
  }

  public function manageRights(){
    // Gérer les droits des utilisateurs

    // manage_users.php
    $this->render("admin/gestion-membres");
  }

  public function banUser(){
    // Bannir un utilisateur en l'empêchant de se connecter

    // manage_users.php
    $this->render("admin/gestion-membres");
  }
} ?>
