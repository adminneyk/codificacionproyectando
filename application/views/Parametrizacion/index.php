<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li class="active">Mis Marcos de Trabajo</li>
</ol>

<legend>Mis Marcos de Trabajo</legend>
<a href="<?=base_url()?>parametrizacion/formulario" class="btn btn-warning">Agregar Marco de Trabajo</a>
<br><br>
<?php
$this->load->view('Genericas/mensajes');
?>
<br>
<?php 
if($parametrizaciones==FALSE){
    ?>
    <div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No se Encuentran Marcos de Trabajo Creados por Usted
    </div>
        <?php
} else {
?>
<br>
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
    foreach ($parametrizaciones->result() as $parametros) {
        ?>
        <tr>
            <td><?php echo $parametros->nom_parametrizacion; ?></td>
            <td><?php echo $parametros->descripcion_parametrizacion; ?></td>
            <td><?php 
            if($parametros->estado== 0 ){
                echo "Sin Publicar";
            } else {
                echo "Publicada";
                } ?></td>
        <?php 
            if ($parametros->estado == 1) {
                ?>
                <td colspan="2"><strong>Parametrización Publicada</strong></td>
                <?php

            } else {
        ?>
            <td>
            <a href="<?= base_url()?>parametrizacion/formulario/<?=$parametros->id_parametrizacion; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
            <td> <a href="<?= base_url()?>parametrizacion/formulariofases/<?=$parametros->id_parametrizacion; ?>"><span class="glyphicon glyphicon-list-alt"></span> Configurar</a></td>
            <?php 
}
            ?>
        </tr>
        <?php
    }
    ?>
</table>
    <?php 
}
    ?>