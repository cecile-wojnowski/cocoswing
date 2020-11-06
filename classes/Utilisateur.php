<?php

class Utilisateur{
  private $id;
  private $email;
  private $prenom;
  private $nom;
  private $telephone;
  private $pseudoFacebook;
  private $password;
  private $admin; // Booléen

  public function hydrater(){
    // Permet de récupérer les infos stockées en bdd de l'utilisateur
  }
  public function creerCompte(){

  }

  public function modifierInfos(){

  }

  public function afficherHistorique(){
    // Affiche l'historique d'achat
  }

  public function seConnecter(){

  }

  public function seDeconnecter(){

  }

  public function choisirFormule(){
    /* Affichage de la formule adéquate
    après remplissage du formulaire de la page adhesion.php ? */
  }

  public function rejoindreCours(){
    // Permet de faire une demande pour rejoindre un cours proposé dans le planning
  }
}
 ?>
