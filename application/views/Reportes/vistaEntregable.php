<script>
    var densityCanvas = document.getElementById("densityChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var labeldata = [];

var datainfo = [];
<?php 
$informacionalbel = explode("|", $labels);
for ($i = 0; $i < count($informacionalbel); $i++) {
    if($informacionalbel[$i]!=""){
        
        ?>
        labeldata.push('<?=$informacionalbel[$i]?>');
        <?php
    }
}

$informacioinfor = explode("|", $infor);
for ($i = 0; $i < count($informacioinfor); $i++) {
    if($informacioinfor[$i]!=""){
        
        ?>
        datainfo.push('<?=$informacioinfor[$i]?>');
        <?php
    }
}
?>



var densityData = {
  label: 'Versiones',
  data: datainfo,
  backgroundColor: [
    'rgba(0, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)'
  ],
  borderColor: [
    'rgba(0, 99, 132, 1)'
  ],
  borderWidth: 2,
  hoverBorderWidth: 0
};

var chartOptions = {
  scales: {
    yAxes: [{
      barPercentage: 0.5
    }]
  },
  elements: {
    rectangle: {
      borderSkipped: 'left',
    }
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'horizontalBar',
  data: {
    labels: labeldata,
    datasets: [densityData],
  },
  options: chartOptions
});
    </script>
<canvas id="densityChart" width="500" height="150"></canvas>

