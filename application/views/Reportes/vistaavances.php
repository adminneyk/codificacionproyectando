<script>
Highcharts.chart('container', {

    title: {
        text: 'Cantidad de versiones Generadas Dentro de las Fases por Idea'
    },

   /* subtitle: {
        text: 'Source: thesolarfoundation.com'
    },*/
    xAxis: {
        title: {
            text: 'Fases de Marco'
        }
    },    
    yAxis: {
        title: {
            text: 'Cantidad de Versiones'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },
    <?php 
    
    ?>
            
    series: [<?=$informaciongeneral?>],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>

<div id="container"></div>
