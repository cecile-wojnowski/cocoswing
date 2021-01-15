$(function() {

  $("#inscription").submit(function(e) {
    console.log($("input[name=email]").val());
    e.preventDefault();
    $.ajax({
      url: "includes/afficher_erreurs_inscription.php",
      type: "POST",
      data: {
        email: $("input[name=email]").val(),
        prenom: $("input[name=prenom]").val(),
        nom: $("input[name=nom]").val(),
        telephone: $("input[name=telephone]").val(),
        password: $("input[name=password]").val(),
        confirm_password: $("input[name=confirm_password]").val()
      },
      success: function(data) {
        $(".erreur").removeClass("hidden");

        $(".erreur").text(data);
      }
    })
  })

  $(".form_course_modifier").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(e.currentTarget);
    $.ajax({
      url: "planning",
      type: "POST",
      data: formData,
      processData: false,  // indique à jQuery de ne pas traiter les données
      contentType: false   // indique à jQuery de ne pas configurer le contentType
    })
  })

  $(".delete_course").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form"));
    // attrape la balise form dont le bouton est l'enfant
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "deleteCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $(".join_course").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form"));
    // attrape la balise form dont le bouton est l'enfant
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "joinCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $(".deleteRequest").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form")[0]);
    // attrape la balise form dont le bouton est l'enfant
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "deleteRequestCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })
})
