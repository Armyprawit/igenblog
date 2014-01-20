var timeloadAll = new Array();
var timeloadPlayer = new Array();
var timeloadPhoto = new Array();
var timeloadRead = new Array();

$(function(){

	Highcharts.setOptions({
     colors: ['#1abc9c','#3498db','#2ecc71']
    });


    // Show Chart Timeload
    $.getJSON( "../admin/api/log.php?type=image&total=20", function(data) {
        $.each(data.data.items, function(k,v) {
            timeloadPhoto.push(v.timeLoad);
        });

        $('#timeloadPhoto').highcharts({
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
                data: timeloadPhoto
            }]
        });
    });


    // Show Chart Timeload
    $.getJSON( "../admin/api/log.php?type=read&total=20", function(data) {
        $.each(data.data.items, function(k,v) {
            timeloadRead.push(v.timeLoad);
        });

        $('#timeloadRead').highcharts({
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
                data: timeloadRead
            }]
        });
    });

    // Show Chart Timeload
    $.getJSON( "../admin/api/log.php?type=watch&total=20", function(data) {
        $.each(data.data.items, function(k,v) {
            timeloadPlayer.push(v.timeLoad);
        });

        $('#timeloadPlayer').highcharts({
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
                data: timeloadPlayer
            }]
        });
    });

	// Show Chart Timeload
    $.getJSON( "../admin/api/log.php?type=all&total=50", function(data) {
        $.each(data.data.items, function(k,v) {
            timeloadAll.push(v.timeLoad);
        });

        $('#timeloadAll').highcharts({
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
                data: timeloadAll
            }]
        });
    });

});