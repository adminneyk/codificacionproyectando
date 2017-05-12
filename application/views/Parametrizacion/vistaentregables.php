<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>parametrizacion">Mis Parametrizaciones</a></li>
  <li><a href="<?=base_url()?>parametrizacion/formulariofases/<?=$idparametrizacion?>">Consolidado  de Actividades</a></li>
  <li class="active">Entregables Configurados</li>
</ol>
<fieldset>
	<legend>Entregables Configurados</legend>

<br>
<br>
<?php 
if (empty($entregables)) {
	?>
<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No se Encuentran Entregables Registrados
</div>
	<?php
} else { ?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Parametrizacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($entregables->result() as $listaentregables) {
        ?>
        <tr>
            <td><?php echo $listaentregables->nombre_entregable; ?></td>
            <td><?php echo $listaentregables->descripcion_entregable; ?></td>
            <td><?php 
            if($listaentregables->estado != 0 ) {
                echo "Activo";
            } else {
                echo "Inactivo";
                } ?></td>
            <td> <a href="<?= base_url()?>parametrizacion/formentregables/<?=$idactividad?>/<?=$idparametrizacion?>/<?=$listaentregables->id_param_entragable; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
}
?>
</fieldset>