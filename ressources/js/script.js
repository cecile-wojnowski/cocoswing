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
})
