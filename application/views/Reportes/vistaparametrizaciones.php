<hr><?php 
if(!empty($consulta)){
    
    ?>
<script type="text/javascript">
    $("#exportar").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "SomeFile" //do not include extension
  }); 
});
</script>
    <button id="exportar" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span> Exportar a Excel</button><br><br>
<table  class="table table-striped" id="table2excel">
    <thead>
        <tr>
            <th>Nombre de Parametrización</th>
            <th>Nombre de Fase</th>
            <th>Nombre de Actividad</th>
            <th>Nombre de Entregable</th>
            <th>Estado del Entregable</th>
        </tr>
    </thead>
    <?php
      foreach ($consulta->result() as $listaparametrizaciones) {
          ?>
    <tr>
            <td><?=$listaparametrizaciones->PARAMETRIZACION?></td>
            <td><?=$listaparametrizaciones->FASE?></td>
            <td><?=$listaparametrizaciones->ACTIVIDAD?></td>
            <td><?=$listaparametrizaciones->ENTREGABLE?></td>
            <td><?=$listaparametrizaciones->ESTADO?></td>
        </tr>
        <?php
      }
    ?>
</table>
    <?php
    
} else {
    
    ?>
<div class="alert alert-warning">
    <span class="glyphicon glyphicon-bell"></span> No se Encontraror Registros Con el Filtro Actual
</div>
    <?php
}
?>