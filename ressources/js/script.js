$(function() {

  $("#inscription").submit(function(e) {
    console.log($("input[name=email]").val());
    e.preventDefault();
    $.ajax({
      url: "inscription",
      type: "POST",
      data: {
        email: $("input[name=email]").val(),
        prenom: $("input[name=first_name]").val(),
        nom: $("input[name=family_name]").val(),
        telephone: $("input[name=phone]").val(),
        facebook: $("input[name=facebook]").val(),
        password: $("input[name=password]").val(),
        confirm_password: $("input[name=confirm_password]").val()
      },
      success: function(data) {
        $(".erreur").removeClass("hidden");
        $(".erreur").text(data);
      }
    })
  });


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
      $.ajax({
        url: "../administration/updateTypeCourse",
        type: "POST",
        data: {
          name_level: $("#name_level_"+id).val(),
          color: $("#color_"+id).val(),
          id: id
        },
        success: function(data){
          document.location.reload();
        }
      })
    })

    $(".updateTraineeship").click(function(e) {
      e.preventDefault();
      console.log($(this).attr("id").split("_")[1]);
      var id = $(this).attr("id").split("_")[1];
      $.ajax({
        url: "../administration/updateTraineeship",
        type: "POST",
        data: {
          name: $("#name_"+id).val(),
          date: $("#date_"+id).val(),
          id: id
        },
        success: function(data){
          document.location.reload();
        }
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
      url: "../administration/updateCourse",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(data){
        document.location.reload();
      }
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
      contentType: false,
      success: function(data){
        document.location.reload();
      }
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
    }).done(function(data) {
      $(this).closest("tr").remove();
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

$("#picture_profile").click(function(e){
  e.preventDefault();
  $("#picture_profile").replaceWith("<form class='form_picture' method='post' enctype='multipart/form-data'><input type='file' id='picture' name='picture' accept='image/png, image/jpeg'><button type='submit' name='button'>Mettre à jour</button></form>");

  $(".form_picture").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(e.currentTarget);
    $.ajax({
      url: "changePicture",
      type: "POST",
      data: formData,
      processData: false,  // indique à jQuery de ne pas traiter les données
      contentType: false   // indique à jQuery de ne pas configurer le contentType
    })
  })

})




})
