<form class="form_connexion" method="post">
  <div class="label_input">
    <label for="email">Adresse e-mail </label>
    <input type="text" name="email" id="email" placeholder="Saisir son adresse e-mail" required>
  </div>

  <div class="label_input">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Saisir son mot de passe" required>
  </div>

  <div class="center">
    <button type="submit" class="button_pages"> Connexion </button>
    <p class="p_inscription">
      Nouveau ? <a class="link_inscription" href="<?= URL ?>members/inscription">Cliquez ici</a> pour vous inscrire.
    </p>
  </div>
</form>
