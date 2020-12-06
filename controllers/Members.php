<?php
class Members extends Controller{
  public function index(){
    // profile.php
    $this->render("members/profile");
  }
  public function signUp(){
    // S'inscrire

    // sign_up.php
  }
  public function signIn(){
    // Se connecter

    // sign_in.php
  }
  public function updateProfile(){
    // profile.php
  }
  public function subscription(){
    // Choix d'une formule

    // subscription.php
  }
  public function requestCourse(){
    // Demande de participation à un cours
    // planning.php
  }
  public function purchaseHistory(){
    // Historique d'achat de l'utilisateur

    // purchase_history.php
  }
  public function getListRequests(){
    // Voir la liste des demandes de participation à un cours

    // courses_requests.php
  }
} ?>
