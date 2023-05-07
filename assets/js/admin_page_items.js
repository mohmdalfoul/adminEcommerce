$(document).ready(function () {
  var dataTable = $("#items_table_id").DataTable({
    info: true,
    paging: true,
    aLengthMenu: [
      [2, 25, 50, 100],
      [2, 25, 50, 100],
    ],
    iDisplayLength: 2,
    ajax: "items.php?page=1",

    columns: [
      { data: "id" },
      { data: "name_english" },
      { data: "price" },
      { data: "description_english" },
      {
        data: "new_item",
        render: function (new_item) {
          if (parseInt(new_item)) {
            return "<div class='new_item_true'>True</div>";
          } else {
            return "<div class='new_item_false'>False</div>";
          }
        },
      },
      {
        data: "availability",
        render: function (availability) {
          if (parseInt(availability)) {
            return "<div class='available_item_true'>True</div>";
          } else {
            return "<div class='available_item_false'>False</div>";
          }
        },
      },
      { data: "category_name_english" },
      {
        data: "actions",
        searchable: false,
        render: function (actions) {
          return (
            "<button class='btn btn-outline-primary show_item_info' onclick='getItemInformationAction("+actions+")'><i class='fa fa-eye'></i></button><button class='btn btn-outline-warning " +
            actions +
            "'><i class='fa fa-pen'></i></button><button class='btn btn-outline-danger' onclick='f();'><i class='fa fa-trash'></i></button>"
          );
        },
      },
    ],
  });

  dataTable.on("length.dt", function (e, settings, len) {
    //the select entries selected number
    var selectedNumberEntries = dataTable.page.len();

    //number of pages
    var pageInfo = dataTable.page.info();
    var totalPages = pageInfo.pages;

    //number of rows in table
    var rowNumber = dataTable.data().count();

    if (rowNumber < selectedNumberEntries) {
      dataTable.clear();
      //dataTable.draw();
      $.ajax({
        url: "items_limit.php?page=1&limit=" + selectedNumberEntries,
        type: "GET",
        dataType: "json",
        success: function (data) {
          // Loop through data and append to table
          $.each(data, function (index, row) {
            dataTable.row.add(row);
            dataTable.draw(false);
            console.log(row);
          });
        },
      });
    }
  });

  dataTable.on("page.dt", function () {
    // Get the current page number
    var currentPageNumber = dataTable.page() + 1;
    //alert(currentPageNumber);
    //dataTable.page('next').draw('page');
    var pageInfo = dataTable.page.info();
    var totalPages = pageInfo.pages;
    //alert(totalPages);
    if (currentPageNumber == totalPages) {
      $.ajax({
        url: "items_limit.php?page=" + currentPageNumber + "&limit=2",
        type: "GET",
        dataType: "json",
        success: function (data) {
          // Loop through data and append to table
          $.each(data, function (index, row) {
            dataTable.row.add(row);
            dataTable.draw(false);
            console.log(row);
          });
        },
      });
    }
  });

  /*
    $.ajax({
      url: 'items.php',
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        $('items_table_id').dataTable({
          data: data,
          'paging':true,
          'sort': true,
          'searching': true,
          'columns': [
            
            { "data": "id" },
            { "data": "name_english" },
            { "data": "price" },
            { "data": "description_english" },
            { 
              "data": "new_item",
              'render': function (new_item){
                if(new_item){
                  return "<div class='new_item_true'>True</div>";
                }
                else {
                  return "<div class='new_item_false'>False</div>";
                }
              }
            },
            { "data": "availability" },
            {"data": "category_name_english"}
        ]
          
        });
      }
    });
    */
  /*

    $('#items_table_id').DataTable({
      "autoWidth": false,
      "order": [[ 0, "desc" ]],
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url":"items.php",
        "type": "GET",
        "success": function(d){
          console.log(d);
        },
      },
      "columns": [
        { "data": "id" },
            { "data": "name_english" },
            { "data": "description_english" },
            { "data": "price" },
            { "data": "availability" },
            { "data": "new_item" },
            {"data": "category_name_english"}
      ],
    });*/
  /*
     offset=(p-1)*limit
     restfull api
     soap api
     home page 
     {
      jason array
      top banners as list
      middle banner as list
      best saller as list
      new arriaval as list

      all id int al write string
     }
    */
     $("#hide_col").on("change", function (evt) {
      var values = $(this).val();
      
      /*if(!dataTable.column(i).visible() && jQuery.inArray(String(i), values)==-1){
        dataTable.column(0).visible(true);
      }*/
    
      for (var i = 0; i < 8; i++) {
        
        if(!dataTable.column(String(i)).visible()){
          dataTable.column(String(i)).visible(true);
          console.log(i);
        }
      }
      dataTable.columns(values).visible(false);
    
      //dataTable.column(0).visible(false);
    });
    
    $("#add_item").on("click", function () {
      window.location.href="admin_page_add_item.php";
    });
  
   
});
/*$(".show_item_info").on("click", function (){
  var id=parseInt($(this).parent().parent().find("td:eq(0)").text());
  window.location.href="admin_page_show_item_information.php?id="+id;
  alert("helo");
});*/
function checkProductDiscount(){
  var perDis=$("#Item_discount_id");
  
  if($('#discount_check_id').is(":checked")){
    perDis.prop('disabled', false);
  }
  else {
    perDis.prop('disabled', true);
  }
}
function getItemInformationAction(id){
  window.location.href="admin_page_show_item_information.php?id="+id;
}
