<?php 
if(!empty($consulta)){
    
    ?>
<table  class="table table-striped">
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