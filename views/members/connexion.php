<h1 class="h1_form"> Se connecter </h1>

<?php
if(isset($_POST['email'])){
  $utilisateur = new Utilisateur($bdd);
  $utilisateur->seConnecter($_POST['email'], $_POST['password']);
}
 ?>

<form class="form_connexion" action="connexion.php" method="post">
  <div class="label_input">
    <label for="email">Adresse e-mail </label>
    <input type="email" name="email" id="email" placeholder="Saisir son adresse e-mail" required>
  </div>

  <div class="label_input">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Saisir son mot de passe" required>
  </div>

  <div class="center">
    <button type="submit" class="button_pages"> Connexion </button>
    <p class="p_inscription">
      Nouveau ? <a class="link_inscription" href="inscription">Cliquez ici</a> pour vous inscrire.
    </p>
  </div>
</form>
