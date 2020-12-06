<?php
if(empty($_POST['email']))
{
  $empty = "empty_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}elseif(empty($_POST['password']))
{
  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}elseif(isset($_POST['email']))
{
  $email = $_POST['email'];
  $get_email = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
  $get_email->execute();
  $resultat = $get_email->fetch();

  if(!$resultat)
  {
    $unknown = "unknown_email";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($unknown);
  }else{
    $utilisateur = new Utilisateur($bdd);
    $utilisateur->seConnecter($_POST['email'], $_POST['password']);
  }
}elseif(isset($_POST['password']))
{
  $password = $_POST['password'];
  $get_password = $bdd->prepare("SELECT * FROM utilisateurs WHERE password = '$password' ");
  $get_password->execute();
  $resultat = $get_password->fetch();

  if(!$resultat)
  {
    $wrong = "wrong_password";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($wrong);
  }else{
    $utilisateur = new Utilisateur($bdd);
    $utilisateur->seConnecter($_POST['email'], $_POST['password']);
  }
}
 ?>
