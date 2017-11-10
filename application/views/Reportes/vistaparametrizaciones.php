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
            <th>Nombre de parametrización</th>
            <th>Nombre de fase</th>
            <th>Nombre de actividad</th>
            <th>Nombre de entregable</th>
        </tr>
    </thead>
    <?php
      foreach ($consulta->result() as $listaparametrizaciones) {
          ?>
    <tr>
            <td><?=$listaparametrizaciones->nom_parametrizacion?></td>
            <td><?=$listaparametrizaciones->nombre_fase?></td>
            <td><?=$listaparametrizaciones->nombre_actividad?></td>
            <td><?=$listaparametrizaciones->nombre_entregable?></td>
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