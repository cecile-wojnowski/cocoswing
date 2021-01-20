<?php
// Ajuster les conditions & erreurs en fonction des champs et de la bdd
// Empêcher d'utiliser un email déjà existant
// Stocker les erreurs dans un tableau, ou faire un comptage des erreurs
// Et si erreurs = 0, on permet l'inscription
if(empty($_POST['email']))
{
  $empty = "empty_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}
if(empty($_POST['prenom']))
{
  $empty = "empty_name";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}
if(empty($_POST['nom']))
  {
    $empty = "empty_family_name";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($empty);

}
if(empty($_POST['telephone']))
  {
    $empty = "empty_phone";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($empty);

}
if(empty($_POST['password']))
{
  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}
if(empty($_POST['confirm_password']))
{
  $empty = "empty_confirm";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}
if($_POST['password'] != $_POST['confirm_password'])
{
  $error = "error_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($error);

}
if(strlen($_POST['password']) < 8)
{
  $short = "short_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);

}
if(strlen($_POST['telephone']) != 10)
{
  $short = "size_phone";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);

}
if(!is_int($_POST['telephone']))
{
  $short = "format_phone";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);

}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
  $format = "format_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($format);

}
/*else{
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
}*/
 ?>
