var online = new Array();

$(function(){
	Highcharts.setOptions({
     colors: ['#1abc9c','#3498db','#2ecc71']
    });

    // Graph Page Access
     $.getJSON( "../admin/api/online.php", function(data) {
        $.each(data.data.items, function(k,v) {
            online.push([v.page,v.value]);
        });

        $('#online').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Browser market shares at a specific website, 2010'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.0f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: online
        }]
        });
    });
});