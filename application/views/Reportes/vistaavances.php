<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cantidad de versiones por Fase en Idea '
    },
    xAxis: {
        categories: [
            'FASE 1',
            'FASE 2',
            'FASE 3',
            'FASE 4',
            'FASE 5'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'cantidad de versiones'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:f} Versiones</b></td></tr>',
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
    series: [<?=$informaciongeneral?>]
});
</script>

<div id="container"></div>
