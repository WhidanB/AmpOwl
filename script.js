$(document).ready(function () {
  // Gestionnaire d'événements pour le lien "Modifier"
  $(".modif").click(function (event) {
    event.preventDefault();
    var id = $(this).data("id");

    $.ajax({
      type: "GET",
      url: "fetch_data.php",
      data: { id: id },
      success: function (data) {
        var ampoule = JSON.parse(data);

        // Remplir le formulaire avec les données
        $("#editId").val(ampoule.id);
        $("#editDate").val(ampoule.date_amp);
        $("#editFloor").val(ampoule.floor);
        $("#editSide").val(ampoule.side);
        $("#editPrice").val(ampoule.price);

        // Afficher la modal
        $("#myModal").removeClass("hidden");
        $("#myModal").addClass("affich");
        $("#overlay2").removeClass("hidden");
        $("#overlay2").addClass("affich");
      },
    });
  });

  // Gestionnaire d'événements pour le formulaire de modification
  $("#editForm").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "update_data.php",
      data: formData,
      success: function (response) {
        var result = JSON.parse(response);
        if (result.success) {
          // Fermer la modal
          $("#myModal").removeClass("affich");
          $("#myModal").addClass("hidden");
          $("#overlay2").removeClass("affich");
          $("#overlay2").addClass("hidden");
          refreshTable();

          // Actualiser la page ou effectuer d'autres actions nécessaires
        } else {
          alert("La mise à jour a échoué.");
        }
      },
    });
  });
});

$("tbody").on("click", ".modif", function (event) {
  event.preventDefault();
  var id = $(this).data("id");

  $.ajax({
    type: "GET",
    url: "fetch_data.php",
    data: { id: id },
    success: function (data) {
      var ampoule = JSON.parse(data);

      // Remplir le formulaire avec les données
      $("#editId").val(ampoule.id);
      $("#editDate").val(ampoule.date_amp);
      $("#editFloor").val(ampoule.floor);
      $("#editSide").val(ampoule.side);
      $("#editPrice").val(ampoule.price);

      // Afficher la modal
      $("#myModal").removeClass("hidden");
      $("#myModal").addClass("affich");
      $("#overlay2").removeClass("hidden");
      $("#overlay2").addClass("affich");
    },
  });
});

$('tbody').on('click', '.cross', function(event) {
    event.preventDefault();
    var id = $(this).data('id');

    // Afficher la modal de confirmation
    $('#supp').removeClass('hidden');
    $('#supp').addClass('affich');
    $(".overlay").removeClass("hidden");
    $(".overlay").addClass("affich");
    // Mettre l'ID dans l'attribut data-id de .confirmDel
    $('.confirmDel').data('id', id);
});

$('.confirmDel').click(function(event) {
    event.preventDefault();
    var id = $(this).data('id');

    // Envoyer la requête de suppression
    $.ajax({
        type: "GET", // Utilisez la méthode GET pour la suppression
        url: "delete.php?id=" + id, // Utilisez le fichier delete.php
        success: function(response) {
            var result = JSON.parse(response);
            if (result.success) {
                // Fermer la modal de confirmation
                $('#supp').addClass('hidden');

                // Actualiser le tableau après la suppression réussie
                refreshTable();
            } else {
                alert("La suppression a échoué.");
            }
        }
    });
});

function refreshTable() {
  $.ajax({
    type: "GET",
    url: "refresh_table.php",
    success: function (data) {
      $("#tableBody").html(data);
    },
  });
}
