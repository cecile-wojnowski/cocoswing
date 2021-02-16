<div class="container">
  <div class="row">
    <h2 class="center-align">Contactez-nous</h2>
    <form class="col s10 m10 offset-m2" action="formContact" method="post">

      <div class="row">
        <div class="input-field col s4">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Nom</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Prénom</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Votre message</label>
        </div>
      </div>
      <button type="submit" name="button">Envoyer</button>
    </form>
  </div>

</div>
