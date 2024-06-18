
$('tr[data-toggle="modal"]').click("click", function () {
  var userId = $(this).data("user-id");

  $.ajax({
    url: "user-detail-dialog.php",
    method: "POST",
    data: { id: userId },
    success: function (response) {
      $(".dialog-content").html(response);

      $("#userDatailDialog").addClass("show");
    },
  });
});

$("#userDatailDialog").click("click", function () {
  $("#userDatailDialog").removeClass("show");
});
