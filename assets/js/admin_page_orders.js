$(document).ready(function () {
  $("#orders_table_id").DataTable();
  $(".showOrderInfo").on("click", function (evt) {
    var orderId = parseInt($(this).parent().parent().find("td:eq(0)").text());
    window.location.href = "admin_page_show_order_info.php?id=" + orderId;
  });
  $(".editOrderButton").on("click", function (evt) {
    var orderId = parseInt($(this).parent().parent().find("td:eq(0)").text());
    var orderStatus = $(this).parent().parent().find("td:eq(2)").text();
    $("#order_id").val(orderId);
    $("#order_status_id").val(orderStatus);
  });
  $("#edit_order_status_form").on("submit", function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    fetch("http://localhost/adminEcommerce/edit_order_status.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result) {
          swal("Edit Order Success", "", "success").then((value) => {
            window.location.reload();
          });
        } else {
          swal("Edit Order Failed", data.error, "error");
        }

        console.log(data);
      })
      .catch((error) => {
        console.log(error);
      });
  });
});

/*
 order status:
 
*/
