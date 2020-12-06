<?php
class Admin extends Controller{
  public function index(){
    // View: admin.php - Page d'accueil de l'administration : contiendrait le sommaire des différentes pages
  }
  public function manageCourseRequest(){
    // Gérer les demandes d'inscription aux cours

    // manage_requests.php
  }
  public function manageSubscriptions(){
    // Gérer les formules

    // manage_subscriptions.php
  }

  public function checkDocument(){
    // Vérifier les documents envoyés par les utilisateurs

    // manage_documents.php
  }

  public function getUsers(){
    // Affiche la liste des membres inscrits

    // manage_users.php
  }

  public function manageRights(){
    // Gérer les droits des utilisateurs

    // manage_users.php
  }

  public function banUser(){
    // Bannir un utilisateur en l'empêchant de se connecter

    // manage_users.php
  }
} ?>
