$(function() {
  $(".form_connexion").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: "includes/afficher_erreurs_inscription.php",
      method: "POST",
      data: {
        pseudo: $("input[name=pseudo]").val(),
        email: $("input[name=email]").val(),
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
