function inList(value, array) {
  for (var i = 0; i < array.length; i++) {
    if (value == array[i]) {
      return true;
    }
  }
  return false;
}
function activateSlideBar() {
  var pageURL = $(location).attr("href");
  var splitPageUrl = pageURL.split("//");
  var splitServerPageUrl = splitPageUrl[1].split("/");
  var pageNameArray = splitServerPageUrl[2].split("?");
  var pageName = pageNameArray[0];
  var adminDashbord = ["admin_page_dashbord.php"];
  var adminProducts = ["admin_page_show_items.php"];
  var adminCategories = [
    "admin_page_show_categories.php",
    "admin_page_add_category.php",
  ];
  var adminOrders = ["admin_page_show_orders.php"];
  var adminCustomers = ["admin_page_show_customers.php"];
  if (inList(pageName, adminProducts)) {
    $(".items").addClass(" active");
  } else if (inList(pageName, adminCategories)) {
    $(".categories").addClass(" active");
  } else if (inList(pageName, adminOrders)) {
    $(".orders").addClass(" active");
  } else if (inList(pageName, adminCustomers)) {
    $(".customers").addClass(" active");
  } else if (inList(pageName, adminDashbord)) {
    $(".dashbord").addClass(" active");
  }
}

$(document).ready(function () {
  activateSlideBar();
});
