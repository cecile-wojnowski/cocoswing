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
  private $dateInscription;

  public function __construct($_bdd){
    return $this->_bdd = $_bdd;
  }

  public function crypterPassword($_password){
    $password = password_hash($_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }

  public function creerCompte($_email, $_prenom, $_nom, $_telephone, $_pseudoFacebook, $_password){
    // Récupère les infos entrées dans le formulaire
    // Et les insère dans la bdd pour créer un utilisateur

    $inscription = $this->_bdd->prepare("INSERT INTO utilisateurs
      (email, prenom, nom, telephone, pseudo_facebook, password, date_inscription)
      VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $inscription->execute([$_email, $_prenom, $_nom, $_telephone, $_pseudoFacebook, $_password]);

    if($inscription){
      header("Location:connexion.php");
    }
  }

    public function seConnecter($email, $password){

      $connexion = $this->_bdd->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
      $connexion->execute();
      $resultat = $connexion->fetch();

      if($resultat){
        if(password_verify($password, $resultat['password'])){
          header('Location:mon_profil.php');
        }
      }
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

  public function hydrater(array $donnees)
    {
      if (isset($donnees['id']))
    {
      $this->setId($donnees['id']);
    }
    if (isset($donnees['nom']))
    {
      $this->setNom($donnees['nom']);
    }
    if (isset($donnees['prenom']))
    {
      $this->setPrenom($donnees['prenom']);
    }
    if (isset($donnees['email']))
    {
      $this->setEmail($donnees['email']);
    }
    if (isset($donnees['telephone']))
    {
      $this->setTelephone($donnees['telephone']);
    }
    if (isset($donnees['pseudo_facebook']))
    {
      $this->setPseudoFacebook($donnees['pseudo_facebook']);
    }
    if (isset($donnees['date_inscription']))
    {
      $this->setDateInscription($donnees['date_inscription']);
    }
    if (isset($donnees['password']))
    {
      $this->setPassword($donnees['password']);
    }
    if (isset($donnees['admin']))
    {
      $this->setAdmin($donnees['admin']);
    }
    }


  /***************** Setters *******************/

  public function setId($_id){
    $_id = (int) $_id;
   // On vérifie si ce nombre est bien strictement positif.
   if ($_id > 0)
   {
     // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
     $this->_id = $_id;
   }
 }
 public function setEmail($_email){
   if (is_string($_email))
   {
     $this->_email = $_email;
   }
 }
  public function setNom($_nom){
    if (is_string($_nom))
    {
      $this->_nom = $_nom;
    }
  }
  public function setPrenom($_prenom){
    if (is_string($_prenom))
    {
      $this->_prenom = $_prenom;
    }
  }

  public function setTelephone($_telephone){
    $_telephone = (int) $_telephone;
   // On vérifie si ce nombre est bien strictement positif.
   if ($_telephone > 0)
   {
     // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
     $this->_telephone = $_telephone;
   }
 }

   public function setPseudoFacebook($_pseudoFacebook){
     if (is_string($_pseudoFacebook))
     {
       $this->$_pseudoFacebook = $_pseudoFacebook;
     }
   }
   public function setPassword($_password){
     if (is_string($_password))
     {
       $this->_password = $_password;
     }
   }
   public function setAdmin($_admin){
     $_admin = (int) $_admin;
    // On vérifie si ce nombre est bien strictement positif.
    if ($_admin > 0)
    {
      // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
      $this->$_admin = $_admin;
    }
  }
    public function setDateInscription($_dateInscription){
      $_dateInscription = (int) $_dateInscription;
     // On vérifie si ce nombre est bien strictement positif.
     if ($_dateInscription > 0)
     {
       // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
       $this->$_dateInscription = $_dateInscription;
     }
   }


 /**** Getters ***/

 public function password(){
   return $this->_password;
 }



}
 ?>
