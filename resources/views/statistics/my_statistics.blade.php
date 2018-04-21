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
                text: 'Your allergies frequency(TODO: de luat date din BD!!!) '
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
            series: [
            {
                name: 'Allergy1',
                data: [49, 71, 106, 129]

            }, {
                name: 'Allergy2',
                data: [83, 78, 98, 93]

            }, {
                name: 'Allergy3',
                data: [48, 38, 39, 41]

            }, {
                name: 'Allergy4',
                data: [42, 33, 34, 39]

            },
            {
                name: 'Allergy5',
                data: [42, 33, 34, 39]

            },
            {
                name: 'Allergy6',
                data: [42, 33, 34 , 39]

            },
            {
                name: 'Allergy 7',
                data: [42, 33, 34, 39]

            }]
        });
});
   
</script>