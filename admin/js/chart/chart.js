var timeload = new Array();
var sql = new Array();
var pageAccess = new Array();
var online = new Array();

// Action Event
var actionEvent = new Array();
var view = new Array();
var watch = new Array();

$(function(){
    Highcharts.setOptions({
     colors: ['#1abc9c','#7f8c8d','#34495e']
    });

    // Show Chart Action Event
    $.getJSON( "../admin/api/action-event.php", function(data) {
        $.each(data.data.items, function(k,v) {
            view.push(v.view);
            watch.push(v.watch);
        });

        actionEvent = [{
            name: 'เปิดหน้าเพจ',
            data: view
        },{
            name: 'เข้าชมเกิน 12 วินาที',
            data: watch
        }];


        $('#actionEvent').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'บทความ',
                    'รูปภาพ',
                    'คลิปวิดีโอ'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: actionEvent
        });
    });


    // Show Chart Timeload
    $.getJSON( "../admin/api/log.php?type=all&total=10", function(data) {
        $.each(data.data.items, function(k,v) {
            timeload.push(v.timeLoad);
        });

        $('#timeLoad').highcharts({
            chart: {
                type: 'areaspline'
            },

            title: {
                text: 'ความเร็วในการเปิดหน้าเว็บ'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'เวลา'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' วินาที'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'เวลา',
                data: timeload
            }]
        });
    });


    // Show Chart SQL
    $.getJSON( "../admin/api/log.php", function(data) {
        $.each(data.data.items, function(k,v) {
            sql.push(v.sql);
        });

        $('#sqlLoad').highcharts({
            chart: {
                type: 'area',
                spacingBottom: 30
            },
            title: {
                text: 'จำนวนการขอข้อมูล (SQL)'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'จำนวน'
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+ 'ID: '+this.x +': '+ this.y+' คำสั่ง';
                }
            },
            plotOptions: {
                area: {
                    fillOpacity: 0.5
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'SQL',
                data: sql
            }]
        });
    });





    // Graph Page Access
     $.getJSON( "../admin/api/page-access.php?e=igensite", function(data) {
        $.each(data.data.items, function(k,v) {
            pageAccess.push([v.page,v.value]);
        });

        $('#pageAccess').highcharts({
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
            data: pageAccess
        }]
        });
    });

});