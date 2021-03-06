<div class="container">
  <p id="presentation" class="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras scelerisque ante et nunc rhoncus, a rhoncus felis facilisis. Fusce erat velit, eleifend ac ex in, sollicitudin eleifend mauris. Maecenas imperdiet nibh vitae nisi commodo egestas. Aliquam orci felis, accumsan vitae sem non, ultrices aliquet nulla. Morbi aliquam tellus sit amet gravida consectetur. Pellentesque vitae tincidunt mi, sit amet faucibus tellus. Duis fermentum, libero a faucibus sodales, nunc massa mollis massa, ut fermentum erat ex sit amet nunc. Nullam vel turpis finibus, fermentum purus eget, pharetra sem. Curabitur neque est, laoreet vel vestibulum nec, tincidunt quis massa. Fusce non mi ac velit feugiat bibendum. Mauris et ex at felis dapibus dictum. Aliquam a odio nec nibh tempor pellentesque. Fusce ut ligula in leo efficitur molestie quis eu lorem. Proin sed eros sit amet tortor ultrices dignissim. Suspendisse sagittis est mi, vehicula egestas nisi tempor in.</p>

  <div class="row">
    <div class="divider"></div>
    <h2 id="contact" class="center-align">Contactez-nous</h2>
    <form class="col s10 m10 offset-m2" action="formContact" method="post">

      <div class="row">
        <div class="input-field col s4">
          <input name="family_name" id="family_name" type="text" class="validate">
          <label for="family_name">Nom</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input name="first_name" id="first_name" type="text" class="validate">
          <label for="first_name">Prénom</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 m10">
          <textarea name="message" id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Votre message</label>
        </div>
      </div>
      <button type="submit" name="button">Envoyer</button>
    </form>
  </div>
</div>
