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
            Your allergies frequency
        </h1>
       
    </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            
            <!-- Default box -->    
            <div class="box">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Allergy questionnaire</h3> -->
                    <!-- <div class="col-md-12"> -->

<div id="container"></div>
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
                text: 'Your allergies frequency '
            },
            xAxis: {
                categories: [
                    'Winter',
                    'Spring',
                    'Summer',
                    'Fall'
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
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
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
            series: [
            {
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2]

            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4]

            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4]

            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7]

            },
            {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7]

            },
            {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7]

            },
            {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7]

            }]
        });
});
   
</script>