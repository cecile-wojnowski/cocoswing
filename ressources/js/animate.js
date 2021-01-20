// Page cours.php
// Apparition des liens lors du click
  $("#scale-cours-trigger1").click(function(){
    if($(".scale-cours1").hasClass("scale-out")){
      $(".scale-cours1").removeClass("scale-out");
      $(".scale-cours1").addClass("scale-in");
    }else{
      $(".scale-cours1").removeClass("scale-in");
      $(".scale-cours1").addClass("scale-out");
    }
  });
  $("#scale-cours-trigger2").click(function(){
    if($(".scale-cours2").hasClass("scale-out")){
      $(".scale-cours2").removeClass("scale-out");
      $(".scale-cours2").addClass("scale-in");
    }else{
      $(".scale-cours2").removeClass("scale-in");
      $(".scale-cours2").addClass("scale-out");
    }
  });
  $("#scale-cours-trigger3").click(function(){
    if($(".scale-cours3").hasClass("scale-out")){
      $(".scale-cours3").removeClass("scale-out");
      $(".scale-cours3").addClass("scale-in");
    }else{
      $(".scale-cours3").removeClass("scale-in");
      $(".scale-cours3").addClass("scale-out");
    }
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


// Page adhesion.php
// Changement de couleur lors du clic sur l'une des cases
$("#blue_radio1").click(function(){
    $('#blue_radio1').css('background-color', '#044D59');
});
$("#blue_radio2").click(function(){
    $('#blue_radio2').css('background-color', '#044D59');
});

$("#orange_radio1").click(function(){
    $('#orange_radio1').css('background-color', '#945010');
});
$("#orange_radio2").click(function(){
    $('#orange_radio2').css('background-color', '#945010');
});

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
