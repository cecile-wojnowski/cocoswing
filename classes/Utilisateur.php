<?php

class Utilisateur{
  private $_bdd;

  private $_id;
  private $_email;
  private $_prenom;
  private $_nom;
  private $_telephone;
  private $_pseudoFacebook;
  private $_password;
  private $_admin; // Booléen

  public function __construct($_bdd){
    return $this->_bdd = $_bdd;
  }

  public function hydrater(){
    // Permet de récupérer les infos stockées en bdd de l'utilisateur
  }

  public function crypterPassword($_password){
    $password = password_hash($_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }

  public function creerCompte($_email, $_prenom, $_nom, $_telephone, $_pseudoFacebook, $_password){
    // Récupère les infos entrées dans le formulaire
    // Et les insère dans la bdd pour créer un utilisateur

    $inscription = $this->_bdd->prepare("INSERT INTO utilisateurs (email, prenom, nom, telephone, pseudo_facebook, password)
    VALUES (?, ?, ?, ?, ?, ?)");
    $inscription->execute([$_email, $_prenom, $_nom, $_telephone, $_pseudoFacebook, $_password]);

    if($inscription){
      header("Location:connexion.php");
    }

  }

    public function seConnecter(){
      
    }

    public function seDeconnecter(){

    }


  public function modifierInfos(){

  }

  public function afficherHistorique(){
    // Affiche l'historique d'achat
  }


  public function choisirFormule(){
    /* Affichage de la formule adéquate
    après remplissage du formulaire de la page adhesion.php ? */
  }

  public function rejoindreCours(){
    // Permet de faire une demande pour rejoindre un cours proposé dans le planning
  }

 /**** Getters ***/

 public function password(){
   return $this->_password;
 }

}
 ?>
