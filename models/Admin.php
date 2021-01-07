<?php
class Admin extends Model {

  public function afficherDemandesCours(){
    // Affiche la liste des demandes d'inscription à un cours

    $demandesCours = $this->_connection->prepare("SELECT * FROM courses_requests INNER JOIN users
      ON courses_requests.id_user = users.id");
    $demandesCours->execute();
    $resultat = $demandesCours->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
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



  public function accepterDemandeCours(){

  }

  public function refuserDemandeCours(){

  }

}
 ?>
