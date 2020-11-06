<?php
class Admin extends Utilisateur{

  public function creerCours{
    // Permet d'ajouter un cours dans le planning
  }

  public function verifierJustificatif(){
    // Valide ou refuse l'inscription d'un utilisateur
  }

  public function afficherUtilisateurs(){
    // Permet de voir tous les utilisateurs inscrits sur le site
    // Il faudrait proposer une barre de recherche pour faciliter la navigation
    // Ainsi qu'une pagination
  }

  public function modifierUtilisateur(){
    // L'admin a la possibilité de modifier les informations des membres ?
  }

  public function bannirUtilisateur(){
    // Empêche la connexion d'un utilisateur en lui affichant un message spécifique ?
  }

  public function afficherDemandesCours(){
    // Affiche la liste des demandes d'inscription à un cours
    // Cette liste sera-t-elle en base de données ? Faut-il une nouvelle table ?
    // ou bien utiliser la table de jonction utilisateur_cours ?
  }

  public function accepterDemandeCours(){

  }

  public function refuserDemandeCours(){

  }

}
 ?>
