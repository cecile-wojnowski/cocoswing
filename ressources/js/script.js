$(function() {

  /*  $("#inscription").submit(function(e) {
    console.log($("input[name=email]").val());
    e.preventDefault();
    $.ajax({
      url: "../ressources/includes/afficher_erreurs_inscription.php",
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
    */

    $("#recherche_membre").submit(function(e) {
      e.preventDefault();
      var formData = new FormData(e.currentTarget);
      $.ajax({
        url: "searchUser",
        type: "POST",
        data: formData,
        processData: false,  // indique à jQuery de ne pas traiter les données
        contentType: false   // indique à jQuery de ne pas configurer le contentType
      })
    })

    $("#search").autocomplete({
      source: "searchUser"
    });

    $(".updateTypeCourse").click(function(e) {
      e.preventDefault();
      console.log($(this).attr("id").split("_")[1]);
      var id = $(this).attr("id").split("_")[1];
      // attrape la balise form dont le bouton est l'enfant
      $.ajax({
        url: "../administration/updateTypeCourse",
        type: "POST",
        data: {
          name_level: $("#name_level_"+id).val(),
          color: $("#color_"+id).val()
        }
      })
    })


  $(".form_document").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(e.currentTarget);
    $.ajax({
      url: "adhesion",
      type: "POST",
      data: formData,
      processData: false,  // indique à jQuery de ne pas traiter les données
      contentType: false   // indique à jQuery de ne pas configurer le contentType
    })
  })

  $(".form_change_document").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(e.currentTarget);
    $.ajax({
      url: "changeFile",
      type: "POST",
      data: formData,
      processData: false,  // indique à jQuery de ne pas traiter les données
      contentType: false   // indique à jQuery de ne pas configurer le contentType
    })
  })

  $(".form_course_modifier").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(e.currentTarget);
    $.ajax({
      url: "planning",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $(".delete_course").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form"));
    // attrape la balise form dont le bouton est l'enfant
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "../administration/deleteCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $(".join_course").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form"));
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
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "deleteRequestCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $("#fileAccepted").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form")[0]);
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "gestionDocuments",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })

  $("#fileDenied").click(function(e) {
    e.preventDefault();
    console.log($(this).closest("form")[0]);
    var formData = new FormData($(this).closest("form")[0]);
    $.ajax({
      url: "fileDenied",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    })
  })
//})
})
