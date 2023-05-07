$(document).ready(function () {
  $("#categories_table_id").DataTable();
});
$("#addCategoryButton").on("click", function (evt) {
  window.location.href = "admin_page_add_category.php";
});
$(".deleteCategoryButton").on("click", function (evt) {
  var categoryId = parseInt($(this).parent().parent().find("td:eq(0)").text());
  $(".delete_Category_text").text(
    "Do you want to delete Category of ID: " + categoryId
  );
  $(".deleteCategoryModelButton").val(categoryId);
});
$(".deleteCategoryModelButton").on("click", function (evt) {
  var categoryId = $(this).val();
  $.ajax({
    url: "admin_page_delete_category_query.php?id=" + categoryId,
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Populate the select dropdown with the retrieved data
      $.each(data, function(key, value) {
				if (value.result) { 
          $("#deleteCategoryModel").modal("hide");
          swal("Delete Category Success", "", "success").then((value) => {
            window.location.reload();
          });
        } else {
          $("#deleteCategoryModel").modal("hide");
         //alert(value.error);
          swal("Delete Category Failed", value.error, "error");
        }
        
			});
      
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: " + textStatus + " " + errorThrown);
    },
  });
});

$(".editCategoryButton").on("click", function (evt) {
  /* ,{
    method:'POST',
    body: categoryId,
  }
   */
  var categoryId = parseInt($(this).parent().parent().find("td:eq(0)").text());
  //var data=JSON.parse(categoryId);
  //console.log(data);
  fetch("http://localhost/adminEcommerce/get_category.php?id="+categoryId).then(response => response.json()).then(
    data => {
      $("#category_id").val(categoryId);
      $("#category_english_name_id").val(data.name_english);
      $("#category_arabic_name_id").val(data.name_arabic);
      if(data.image!=null){
        $("#category_image_label").text("Replace Category Image: "+data.image);
      }
      else {
        $("#category_image_label").text("Add Category Image");
      }
      
    }
  ).catch(error => {
    console.log(error);
  });
  
  $(".deleteCategoryModelButton").val(categoryId);
});
 var formPost=document.getElementById("edit_category_form");
$("#edit_category_form").on("submit", function (evt) {
  evt.preventDefault();
  var formData=new FormData(this);
  
  fetch("http://localhost/adminEcommerce/edit_category.php",{
    method: "POST",
    body: formData
  }).then(response => response.json()).then(data => {
    if(data.result){
      swal("Edit Category Success","", "success").then((value) => {
        window.location.reload();
      });
    }
    else {
        swal("Edit Category Failed",data.error,"error");
    }
    
    console.log(data);
  }).catch(error => {
    console.log(error);
  });
});

function validateAddCategory() {
  var nameEnglish = $("#category_name_english_id").val();
  var nameArabic = $("#category_name_arabic_id").val();
  if (nameEnglish == "" || nameArabic == "") {
    swal("Fill All Fields!", "", "error");
    return false;
  } else {
    return true;
  }
}
