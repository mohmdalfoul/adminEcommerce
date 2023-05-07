$(document).ready(function(){

    var monthName=[];
    var profit=[];
    var i=0;
    $.ajax({
        url: "admin_page_most_5items_sales.php",
        type: "GET",
        dataType: "json",
        async:false,
        success: function(data) {
			// Populate the select dropdown with the retrieved data
			$.each(data, function(key, value) {

				
                monthName[i]=value.month_name;
                profit[i]=value.profit;
                i++;
			});
            var ctx3 = $("#line_chart").get(0).getContext("2d");
         var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: monthName,
            datasets: [{
                label: "Salse",
                fill: false,
                backgroundColor: "rgba(0, 156, 255, .3)",
                data: profit
            }]
        },
        options: {
            responsive: true
        }
    });
		},
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });

      var itemsName=[];
      var quantities=[];
      i=0;
      $.ajax({
        url: "admin_page_get_profit.php",
        type: "GET",
        dataType: "json",
        async:false,
        success: function(data) {
			// Populate the select dropdown with the retrieved data
			$.each(data, function(key, value) {
                itemsName[i]=value.name_english;
				quantities[i]=value.quantity;
                i++
			});
        var ctx5 = $("#Bi_chart").get(0).getContext("2d");
        var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: itemsName,
            datasets: [{
                backgroundColor: [
                    "rgba(0, 255, 255, .7)",
                    "rgba(255, 0, 255, .6)",
                    "rgba(255, 255, 0, .5)",
                    "rgba(0, 156, 255, .3)",
                    "rgba(156, 0, 255, .3)"
                ],
                data: quantities
            }]
        },
        options: {
            responsive: true
        }
    });
		},
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });
     
      var customerUserName=[];
      var customerBalance=[];
      i=0;
      $.ajax({
        url: "admin_page_favorite_customer.php",
        type: "GET",
        dataType: "json",
        async:false,
        success: function(data) {
			// Populate the select dropdown with the retrieved data
			$.each(data, function(key, value) {
                customerUserName[i]=value.username;
                customerBalance[i]=value.balance;
                i++
			});
            var ctx4 = $("#bar_chart").get(0).getContext("2d");
            var myChart4 = new Chart(ctx4, {
                type: "bar",
                data: {
                    
                    labels: customerUserName,
                    datasets: [{
                        label:"salaing balance",
                        backgroundColor: [
                            "rgba(0, 255, 255, .7)",
                            "rgba(255, 0, 255, .6)",
                            "rgba(255, 255, 0, .5)",
                            "rgba(0, 156, 100, .4)",
                            "rgba(188, 136, 0, .3)"
                        ],
                        data: customerBalance
                    }]
                },
                options: {
                    responsive: true
                }
            });        
		},
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });

    
});