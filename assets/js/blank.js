
$(document).ready(function () {
    $('#items_table_id thead th').each( function () {
        var title = $('#items_table_id thead th').eq( $(this).index() ).text();
        $(this).append( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    $("#items_table_id").DataTable({
        "order": [[2, "asc"]],
        "columnDefs": [ {
            "targets": [0,1],
            "orderable": false
          } ],
          "aLengthMenu": [[25, 50, 75, 100], [25, 50, 75, 100]],
          "iDisplayLength": 25,
        
          initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
 
                    $('input', this.header()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });
  });
  /*var datatable = $('#items_table_id').DataTable({
    "order": [[2, "asc"]]
    
});*/
