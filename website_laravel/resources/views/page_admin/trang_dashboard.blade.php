@extends('templates.template_admin')

@section('main-content')

    <script src="/assets/highchart/highcharts.js"></script>
    <script src="/assets/highchart/highcharts-3d.js"></script>
    <script src="/assets/highchart/exporting.js"></script>
    <script src="/assets/highchart/export-data.js"></script>
    <script src="/assets/highchart/accessibility.js"></script>

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>						  	
            </ol>
        </div>
    </div>
    
    <div class="container_list_chart">
        <figure class="highcharts-figure">
            <div id="container_chart"></div>
            <p class="highcharts-description">
                Chart designed to show the difference between 0 and null in a 3D column
                chart. A null point represents missing data, while 0 is a valid value.
            </p>
        </figure>

        <div id="sliders">
            <table>
              <tbody><tr>
                <td><label for="alpha">Alpha Angle</label></td>
                <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td>
              </tr>
              <tr>
                <td><label for="beta">Beta Angle</label></td>
                <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td>
              </tr>
              <tr>
                <td><label for="depth">Depth</label></td>
                <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td>
              </tr>
            </tbody></table>
        </div>

        <script>
            // Set up the chart
            const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_chart',
                type: 'column',
                options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
                }
            },
            xAxis: {
                categories: ['Toyota', 'BMW', 'Volvo', 'Audi', 'Peugeot', 'Mercedes-Benz',
                'Volkswagen', 'Polestar', 'Kia', 'Nissan']
            },
            yAxis: {
                title: {
                enabled: false
                }
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: 'Cars sold: {point.y}'
            },
            title: {
                text: 'Sold passenger cars in Norway by brand, January 2021'
            },
            subtitle: {
                text: 'Source: ' +
                '<a href="https://ofv.no/registreringsstatistikk"' +
                'target="_blank">OFV</a>'
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                depth: 25
                }
            },
            series: [{
                data: [1318, 1073, 1060, 813, 775, 745, 537, 444, 416, 395],
                colorByPoint: true
            }]
            });

            function showValues() {
            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
            }

            // Activate the sliders
            document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
            }));

            showValues();
        </script>

        
    </div>
</div> 
<!-- project team & activity end -->
@stop