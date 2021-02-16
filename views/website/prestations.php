<div class="container">
  <h1> Prestations </h1>
  <p class="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras scelerisque ante et nunc rhoncus, a rhoncus felis facilisis. Fusce erat velit, eleifend ac ex in, sollicitudin eleifend mauris. Maecenas imperdiet nibh vitae nisi commodo egestas. Aliquam orci felis, accumsan vitae sem non, ultrices aliquet nulla. Morbi aliquam tellus sit amet gravida consectetur. Pellentesque vitae tincidunt mi, sit amet faucibus tellus. Duis fermentum, libero a faucibus sodales, nunc massa mollis massa, ut fermentum erat ex sit amet nunc. Nullam vel turpis finibus, fermentum purus eget, pharetra sem. Curabitur neque est, laoreet vel vestibulum nec, tincidunt quis massa. Fusce non mi ac velit feugiat bibendum. Mauris et ex at felis dapibus dictum. Aliquam a odio nec nibh tempor pellentesque. Fusce ut ligula in leo efficitur molestie quis eu lorem. Proin sed eros sit amet tortor ultrices dignissim. Suspendisse sagittis est mi, vehicula egestas nisi tempor in.</p>
  <div class="row">
    <div class="col s8 m8 offset-m2">
      <h2>Galerie d'images</h2>
      <div class="carousel carousel-slider center">
        <a class="carousel-item" href="#one!"><img src="../ressources/img/carousel1.jpg"></a>
        <a class="carousel-item" href="#two!"><img src="../ressources/img/carousel2.jpg"></a>
        <a class="carousel-item" href="#three!"><img src="../ressources/img/carousel3.jpg"></a>
        <a class="carousel-item" href="#four!"><img src="../ressources/img/carousel4.jpg"></a>
        <a class="carousel-item" href="#five!"><img src="../ressources/img/carousel5.jpg"></a>
      </div>
    </div>
  </div>

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
