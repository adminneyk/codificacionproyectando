<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li class="active">Indicadores Por Fases</li>
</ol>
<fieldset>
<legend>Indicadores Por Fases</legend>
<!DOCTYPE html>
	
</fieldset>
<canvas id="myChart" width="500" height="150"></canvas>
<script>
    
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
      type: 'bar',
    data: {
      labels: ["FASE 1", "FASE 2", "FASE 3", "FASE 4", "FASE 5"],
      datasets: [
        {
          label: "Cantidad de Versiones",
          backgroundColor: ["#ff8633", "#ff8633","#ff8633","#ff8633","#ff8633"],
          data: [<?php echo $inforfases; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Cantidad de Versiones por Fases'
      }
    }
});
</script>