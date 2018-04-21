@extends('backpack::layout')


<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
@section('header')
    <section class="content-header">
        <h1>
            Statistics for all users
        </h1>
       
    </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            
            <!-- Default box -->    
            <div class="box">
                <div class="box-header with-border">
                             
                    <div class="container">
                        <div class="col-md-12" id="container"></div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="col-md-12" id="allergens"></div>
                    </div>

                    <hr>
                    
                    <div class="container">
                        <div class="col-md-6" id="countries"></div>
                        <div class="col-md-6" id="seasons"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>                
@endsection




<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) { 

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Your allergies frequency'
            },
            xAxis: {
                categories: [
                    'Winter',
                    'Spring',
                    'Summer',
                    'Fall',
                    'No info about season'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Frequency'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key} </span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td> ' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0,
                    borderWidth: 0
                }
            },
            series:  {!! $seriesFrequencies !!}
        });


    Highcharts.chart('countries', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Your allergies frequency by countries'
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
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series:  [{ 
            name: 'Frequency',
            colorByPoint: true,
            data: {!! $seriesCountries !!}
        }]
    });


    Highcharts.chart('seasons', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Your allergies frequency by seasons'
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
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series:  [{ 
            name: 'Frequency by seasons',
            colorByPoint: true,
            data: {!! $seriesSeasons !!}
        }]
});


    Highcharts.chart('allergens', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Allergen frequency'
    },
    xAxis: {
        categories: ['Allergens'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Allergen frequency',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' cases'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: {!! $seriesAllergens !!}
});

});



   
</script>