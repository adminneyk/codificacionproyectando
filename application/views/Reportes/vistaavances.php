<canvas id="speedChart" width="500" height="150"></canvas>
<script>
    var speedCanvas = document.getElementById("speedChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var cars = [];
<?php
$exploideas = explode("_", $informaciongeneral);
for ($i = 0; $i < count($exploideas); $i++) {
//echo $exploideas[$i].'<br>';
    $informacion = explode("|", $exploideas[$i]);
    if ($informacion[0] && $informacion[1]) {
       
        ?>
            
        var campo<?= $i ?> = <?php echo "{
    label: '{$informacion[0]} ',
    data: [{$informacion[1]}],
    lineTension: 0,
    fill: false,
    borderColor: 'orange',
    backgroundColor: 'transparent',
    borderDash: [5, 5],
    pointBorderColor: 'orange',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'
  };"; ?>
        cars.push(campo<?= $i ?>);
    <?php
    }
}

?>
    var speedData = {
        labels: ["FASE 1", "FASE 2", "FASE 3", "FASE 4", "FASE 5"],
        datasets: cars
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        },
        scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Fases de Investigacion'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Cantidad de Versiones'
                        }
                    }]
                }
    };

    var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
    });
</script>
