<div class="erreur hidden"></div>
<form class="form_connexion" action="inscription" method="post" id="inscription">

  <div class="label_input">
    <label for="email">Adresse e-mail </label>
    <input type="text" name="email" id="email" placeholder="Saisir son adresse e-mail">
  </div>

  <div class="label_input">
    <label for="first_name"> Prénom </label>
    <input type="text" name="first_name" id="first_name" placeholder="Saisir son prénom">
  </div>

  <div class="label_input">
    <label for="family_name"> Nom </label>
    <input type="text" name="family_name" id="family_name" placeholder="Saisir son nom">
  </div>

  <div class="label_input">
    <label for="phone"> N° de téléphone </label>
    <input type="tel" name="phone" id="phone" placeholder="Saisir son numéro de téléphone">
  </div>

  <div class="label_input">
    <label for="pseudo_facebook"> Pseudo Facebook* </label>
    <input type="text" name="pseudo_facebook" id="pseudo_facebook" placeholder="Saisir son pseudo Facebook">
  </div>

  <div class="label_input">
    <label for="password">Mot de passe (8 caractères minimum)</label>
    <input type="password" id="password" name="password"
    placeholder="Saisir son mot de passe">
  </div>

  <div class="label_input">
    <label for="confirm_password">Confirmation du mot de passe </label>
    <input type="password" id="confirm_password" name="confirm_password"
    placeholder="Confirmer son mot de passe">
  </div>

  <button type="submit" class="button_pages" name="submit"> Inscription </button>

  <p class="p_facultatif">
    * Champ facultatif. <br>
    Cela nous permettrait de te retrouver et de t'inviter dans les groupes liés aux activités de l'association.
  </p>
</form>
