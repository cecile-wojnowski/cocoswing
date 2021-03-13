<div class="container">
  <?php if(isset($erreur)){
    echo "<p class='center-align'>" . $erreur . "</p>" ;
  } ?>
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
      <button type="submit" class="btn-large background-blue font-size-18 button_pages"> Connexion </button>
      <p>
        Nouveau ? <a class="blue_link" href="<?= URL ?>members/inscription">Cliquez ici</a> pour vous inscrire.
      </p>
    </div>
  </form>
</div>
