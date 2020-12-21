<?php
class User extends Model{
  private $_id;
  private $_email;
  private $_firstName;
  private $_familyName;
  private $_phone;
  private $_pseudoFacebook;
  private $_password;
  private $_admin = false; // Booléen
  private $_registrationDate;
  private $_picture = 'default.jpg';
  private $_member = false;

  public function __construct()
  {
    // Nous définissons la table par défaut de ce modèle
    $this->table = "users";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
  }

  public function crypterPassword(){
    $password = password_hash($this->_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }

  public function creerCompte(){
    // Récupère les infos entrées dans le formulaire
    // Et les insère dans la bdd pour créer un utilisateur

    $inscription = $this->_connexion->prepare("INSERT INTO users
      (email, first_name, family_name, phone, pseudo_facebook, password, registration_date, picture, member)
      VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $inscription->execute([
      $this->_email,
      $this->_firstName,
      $this->_familyName,
      $this->_phone,
      $this->_pseudoFacebook,
      $this->_password,
      $this->_picture,
      $this->_member
    ]);
  }

    public function seConnecter(){

      $connexion = $this->_connexion->prepare("SELECT * FROM users WHERE email = ? ");
      $connexion->execute([$this->_email]);
      $resultat = $connexion->fetch();

      if($resultat){
        if(password_verify($this->_password, $resultat['password'])){
          return true;
        } else {
          return false;
        }
      } else {
        return false;
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
  // à remplacer par des variables
    {
      if (isset($donnees['id']))
    {
      $this->setId($donnees['id']);
    }
    if (isset($donnees['family_name']))
    {
      $this->setNom($donnees['family_name']);
    }
    if (isset($donnees['first_name']))
    {
      $this->setPrenom($donnees['first_name']);
    }
    if (isset($donnees['email']))
    {
      $this->setEmail($donnees['email']);
    }
    if (isset($donnees['phone']))
    {
      $this->setTelephone($donnees['phone']);
    }
    if (isset($donnees['pseudo_facebook']))
    {
      $this->setPseudoFacebook($donnees['pseudo_facebook']);
    }
    if (isset($donnees['registration_date']))
    {
      $this->setDateInscription($donnees['registration_date']);
    }
    if (isset($donnees['password']))
    {
      $this->setPassword($donnees['password']);
    }
    if (isset($donnees['admin']))
    {
      $this->setAdmin($donnees['admin']);
    }
    if (isset($donnees['picture']))
    {
      $this->setAdmin($donnees['picture']);
    }
    if (isset($donnees['member']))
    {
      $this->setAdmin($donnees['member']);
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

} ?>
