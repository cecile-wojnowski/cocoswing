<div class="container">
  <div class="row">
    <form class="col s10 m10 offset-m2" action="formContact" method="post">

      <div class="row">
        <div class="input-field col s4">
          <input id="first_name" name="family_name" type="text" class="validate">
          <label for="first_name">Nom</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="last_name" name="first_name" type="text" class="validate">
          <label for="last_name">Prénom</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <textarea id="textarea1" name="message" class="materialize-textarea"></textarea>
          <label for="textarea1">Votre message</label>
        </div>
      </div>
      <button type="submit" name="button">Envoyer</button>
    </form>
  </div>

  <div class="row">
    <div class="col s5 m5 offset-m5">
      <h2> Coordonnées: </h2>
      <a class="font-size-18" href="mailto:bonjour@cocoswingmarseille.com">bonjour@cocoswingmarseille.com</a>
      <p class="font-size-18"> +33 6 68 36 42 07  </p>
    </div>
  </div>

</div>
