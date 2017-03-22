function top_items(filter){

   $.ajax(
            {
                url: "sales/top-items?filter="+filter,
            }
        )
        .done(function( data ) {
                $('#highchart_4').highcharts({
                chart: {
                    type: 'column',
                    style: {
                        fontFamily: 'Open Sans'
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                xAxis: {
                    title: {
                        text: null
                    },
                    categories:data[1]
                },
                yAxis: {
                    min:0,
                    title: {
                        text: null
                    },
                },
                series: eval(JSON.parse(data[0]))
            });
          });
    }

function sales_forecast(filter)
{
    // LINE CHART 1
    $.ajax({
        url:'sales/forecast?filter='+filter,
    }).done(function(data){
        console.log(data);
                $('#highchart_1').highcharts({
        chart : {
            style: {
                fontFamily: 'Open Sans'
            }
        },
        title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: data['categories']
                ,
          plotLines: [{
            color: 'red', // Color value
            dashStyle: 'longdashdot', // Style of the plot line. Default to solid
            value: 0.5, // Value of where the line will appear
            width: 2 // Width of the line    
          }]
        
        },
        yAxis: {
            title: {
                text: 'Sales ($)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Sales',
            data: data['data']
        }]
    });
    });
}
function top_cards(filter)
{
    $.ajax(
        {
            url:"sales/quick-stats?filter="+filter,   
        }
        ).done(function(data){
            // console.log(data[0].total);
            $('#lowest_seller_name').html(data[0].item_name);
            $('#lowest_seller_number').html(Math.round(data[0].total));
            $('#top_seller_name').html(data[1].item_name);
            $('#top_seller_number').html(Math.round(data[1].total));
            $('#total_card_number').html(Math.round(data[2].total));

        });
}
jQuery(document).ready(function() {
    top_items("monthly");
    sales_forecast("monthly");
    top_cards("monthly");
});
