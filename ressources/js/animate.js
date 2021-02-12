// Page cours.php
// Apparition des liens lors du click
  $("#scale-cours-trigger1").mouseenter(function(){
      $(".scale-cours1").removeClass("scale-out");
      $(".scale-cours1").addClass("scale-in");

      // Cas du scale-cours2
      $(".scale-cours2").removeClass("scale-in");
      $(".scale-cours2").addClass("scale-out");

      // Cas du scale-cours3
      $(".scale-cours3").removeClass("scale-in");
      $(".scale-cours3").addClass("scale-out");

  });

  $("#scale-cours-trigger2").mouseenter(function(){
      $(".scale-cours2").removeClass("scale-out");
      $(".scale-cours2").addClass("scale-in");

      // Cas du scale-cours1
      $(".scale-cours1").removeClass("scale-in");
      $(".scale-cours1").addClass("scale-out");

      // Cas du scale-cours3
      $(".scale-cours3").removeClass("scale-in");
      $(".scale-cours3").addClass("scale-out");

  });

  $("#scale-cours-trigger3").mouseenter(function(){
      $(".scale-cours3").removeClass("scale-out");
      $(".scale-cours3").addClass("scale-in");

      // Cas du scale-cours1
      $(".scale-cours1").removeClass("scale-in");
      $(".scale-cours1").addClass("scale-out");

      // Cas du scale-cours2
      $(".scale-cours2").removeClass("scale-in");
      $(".scale-cours2").addClass("scale-out");

  });

// Page prestation.php
// Galerie d'images
$(document).ready(function(){
  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
});


// Page presentation.php
// Apparition/disparition en fondu des textes de présentation des profs
$(".img_profs").click(function() {
  $( ".p_profs" ).toggle( "fade" );
  $( ".h3_profs" ).toggle( "fade" );
});

// Page cours.php
// Effet d'explosition lors du clic sur le bouton
// 0U effet de transition entre deux éléments : un bouton et une liste de liens


// Modal Materialize
$(document).ready(function(){
    $('.modal').modal();
  });

// Select Materialize
$(document).ready(function(){
   $('select').formSelect();
 });

 $(document).ready(function(){
   $('.materialboxed').materialbox();
 });
