<?php

class Members extends Controller{

  /*********************************************** Profil ****************************************/

  public function monProfil(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $this->User->hydrater(); // hydrater() applique getOne, ce qui permet de récupérer toutes les infos de l'User
    $infosUser = $this->User->objectToArray(); // Retourne un tableau associatif contenant les propriétés de l'objet User

    if(!empty($_FILES)){
      $this->addFile();
      header('Location:demandesCours');
    }

    $this->render("members/mon-profil",[
      "titlePage" => "Mon compte",
      "infosUser" => $infosUser
    ]);
  }

  public function updateProfile(){
    if(isset($_POST)){
      $this->loadModel("User");
      $this->User->setId($_SESSION['id']);
      $this->User->hydrater($_POST);
      $this->User->modifierInfos();
      header('Location:monProfil');
    }
  }
/*********************************************** Formulaires ****************************************/
  public function inscription(){

    if(!empty($_POST)) {
      //var_dump($_POST);
      $this->loadModel("ErrorMessage");
      // fonction qui retourne TRUE ou FALSE *sans rien afficher*
      // Si FALSE, il y a une erreur, on fait une fonction qui affiche une erreur.
      $tableau = $this->ErrorMessage->verifierInscription();
      if(empty($tableau)){
        var_dump($tableau);
        die();

        $this->loadModel("User");
        $this->User->hydrater($_POST);
        $this->User->creerCompte();
        header("Location:connexion");
      }else{
        var_dump($tableau);
        echo json_encode($tableau);
      }

    } else {
      $this->render("members/inscription", [
        "titlePage" => "S'inscrire",
        "title" => "S'inscrire"
      ]);
    }
  }

  public function connexion(){
    if(isset($_POST["email"])){
      $this->loadModel("User");
      $this->User->hydrater($_POST); // On hydrate l'email

      if($this->User->seConnecter()) { // Si l'email existe en bdd
        $this->User->hydrater();
        $_SESSION["id"] = $this->User->_id;
        $_SESSION['family_name'] = $this->User->_familyName;
        $_SESSION['first_name'] = $this->User->_firstName;
        $_SESSION['member'] = $this->User->_member;
        $_SESSION['admin'] = $this->User->_admin;

        header('Location:monProfil');
      } else {
        echo "Vous n'êtes pas identifié.";
      }
    }else{
      $this->render("members/connexion", [
        "titlePage" => "Se connecter",
        "title" => "Se connecter"
      ]);
    }
  }

  public function deconnexion(){
    $this->loadModel("User");
    if($this->User->seDeconnecter()){
      header('Location:../website');
    }
  }

/*********************************************** Choix d'une formule ****************************************/
  public function adhesion(){
    if(!empty($_POST)){
      if($_POST['lower_price'] == 1){
        if(!empty($_FILES)){
          $this->addFile();
          $this->loadModel("User");
          $this->loadModel("Subscription");
          $helloAsso = $this->Subscription->choisirFormule($_POST);
          header('Location:demandesCours');
        }
      }else{
        $this->loadModel("User");
        $this->loadModel("Subscription");
        $this->User->setId($_SESSION['id']);
        $helloAsso = $this->Subscription->choisirFormule($_POST);
        $this->render("members/adhesion",[
          "titlePage" => "Mon compte",
          "helloAsso" => $helloAsso
        ]);
      }
    }else{
      $this->render("members/adhesion",[
        "titlePage" => "Mon compte"
      ]);
    }
  }

  /*********************************************** Fichiers ****************************************/

  public function addFile(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $this->User->ajouterFichier($_FILES['justificatif']['name']);

    $dir = 'ressources/img/';
    $sourcePath = $_FILES['justificatif']['tmp_name'];
    $targetPath = $dir . $_FILES['justificatif']['name'];

    move_uploaded_file($sourcePath,$targetPath);
  }

  public function changeFile(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $this->User->changerFichier($_FILES['justificatif']['name']);

    $dir = 'ressources/img/';
    $sourcePath = $_FILES['justificatif']['tmp_name'];
    $targetPath = $dir . $_FILES['justificatif']['name'];

    move_uploaded_file($sourcePath,$targetPath);
  }

  public function changePicture(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $this->User->changerPhoto($_FILES['picture']['name']);

    $dir = 'ressources/img/';
    $sourcePath = $_FILES['picture']['tmp_name'];
    $targetPath = $dir . $_FILES['picture']['name'];

    move_uploaded_file($sourcePath,$targetPath);
  }

  /*********************************************** Planning ****************************************/
  public function planning(){
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();
    $stagesUser = $this->Course->getUserTraineeship();

    $this->render("members/planning",[
      "titlePage" => "Mon compte",
      "course" => $course,
      "stagesUser" => $stagesUser
    ]);
  }

  public function leaveTraineeship($idStage){
    $this->loadModel("Course");
    $course = $this->Course->desinscriptionStage($idStage);
    header('Location:'.URL.'members/planning');

  }

  public function joinCourse(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);

    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    if(!empty($_POST)){
      $this->User->rejoindreCours($_POST['id']); // on envoie l'id du cours choisi par l'user
      header("Location:planning");
    }else{
      $this->render("members/planning",[
        "titlePage" => "Mon compte",
        "course" => $course
      ]);
    }
  }

  public function demandesCours(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $demandesCours = $this->User->afficherDemandesCours();
    $documents = $this->User->afficherFichiers();

    if(!empty($_POST)){
      $this->User->modifierRoleDanse($_POST);
    }

    $this->render("members/demandes-cours",[
      "titlePage" => "Mon compte",
      "demandesCours" => $demandesCours,
      "documents" => $documents
    ]);
  }

/*********************************************** Historique d'achats ****************************************/
  public function historiqueAchats(){
    $this->loadModel("User");
    $this->User->setId($_SESSION['id']);
    $historiqueAchats = $this->User->afficherHistorique();
    $this->render("members/historique-achats",[
      "titlePage" => "Mon compte",
      "historique" => $historiqueAchats
    ]);
  }
  /*********************************************** Vidéos ****************************************/
  public function videos(){
    $this->loadModel("User");
    $videos = $this->User->afficherVideos();

    $this->render("members/videos",[
      "titlePage" => "Nos vidéos",
      "videos" => $videos
    ]);
  }

  /*********************************************** API Helloasso ****************************************/

  public function check_payment() {
    // Vérifiation d'un paiement pour l'utilisateur courant
    // créer une correspondance entre la formule et les données de paiements

    // Téléchargement de tous les paiements
    $this->loadModel("Helloasso");
    $this->Helloasso->create_token();
    $payments = $this->Helloasso->get_payments();

    var_dump($payments);

    // Construction de l'objet User
    $this->loadModel("User");
    $this->User->setId($_SESSION["id"]);
    $this->User->hydrater();

    // Vérification de l'existence d'un paiement pour l'utilisateur

    // Comparer formSlug du lien cliqué et formSlug se trouvant dans le paymentReceiptUrl ?
    $test = false;
  /*  foreach($payments as $payment) {
      if($payment["email"] == $this->User->_email & $payment["cashOutState"] == "Transfered" or "CashedOut"
      $state = "Authorized"
      & paymentReceiptUrl != NULL
      & $payment["formSlug"] == $formSlug)
        $test = true;

    } */

    return $test;

  }
} ?>
