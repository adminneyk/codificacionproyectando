<canvas id="speedChart" width="600" height="400"></canvas>
<script>
    var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var cars = [];
    <?php  
    
for($i=2;$i<=6;$i++)
{
    $numero=rand(1, 10);
    $numero2=rand(1, 10);
   $numero3=rand(1, 10);
   $datos=array()
    ?>
   var campo<?=$i?> = <?php echo "{
    label: 'Proyecto  {$i} ',
    data: [{$i}, {$numero}, {$numero2}, 3, ,1 , {$numero3}],
    lineTension: 0.3,
    fill: false,
    pointStyle: 'rect'
  };"; ?>
    cars.push(campo<?=$i?>); 
    <?php
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
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
    </script>

