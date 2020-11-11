<?php
// Ajuster les conditions & erreurs en fonction des champs et de la bdd

include('bdd.php');
include('../classes/Utilisateur.php');
include('../classes/Erreur.php');
// Empêcher d'utiliser un email déjà existant
if(empty($_POST['email']))
{
  $empty = "empty_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}elseif(empty($_POST['pseudo']))
{
  $empty = "empty_pseudo";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif(empty($_POST['password']))
{
  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif(empty($_POST['confirm_password']))
{
  $empty = "empty_confirm";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif($_POST['password'] != $_POST['confirm_password'])
{
  $error = "error_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($error);

}elseif(strlen($_POST['password']) < 8)
{
  $short = "short_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);

}elseif(strlen($_POST['pseudo']) < 3)
{
  $short = "short_pseudo";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);
}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
  $format = "format_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($format);

}else{
  $utilisateur = new Utilisateur($bdd);
  $password = $utilisateur->crypterPassword($_POST['password']);

  $utilisateur->creerCompte(
    $_POST['email'],
    $_POST['prenom'],
    $_POST['nom'],
    $_POST['telephone'],
    $_POST['facebook'],
    $password
  );
}
 ?>
