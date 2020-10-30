// Page presentation.php
// Apparition/disparition en fondu des textes de présentation des profs
$(".img_profs").click(function() {
  $( ".articles_profs" ).toggle( "fade" );
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

$("#fade").modal({
 fadeDuration: 100
});
