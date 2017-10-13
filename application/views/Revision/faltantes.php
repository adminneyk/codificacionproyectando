
<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>revision">Mis Grupos</a></li>
  <li><a href="<?=base_url()?>revision/misPendientes/<?=$this->uri->segment(3, 0)?>">Reviones Pendientes</a></li>
  <li class="active">Revision de Entregables</li>
</ol>
<fieldset>
	<legend>Revision de Entregables</legend>
</fieldset>
<?php
$this->load->view('Genericas/mensajes');
if($listaconteo!=null) {
    ?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Fase</th>
            <th>Actividad</th>
            <th>Entregable</th>
            <th>Descripción del Entregable</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($listaconteo->result() as $lista) {
        ?>
        <tr>
            <td><?php echo $lista->nombre_fase; ?></td>
            <td><?php echo $lista->nombre_actividad; ?></td>
            <td><?php echo $lista->nombre_entregable; ?></td>
            <td><?php echo $lista->descripcion_entregable; ?></td>
            <td> <a href="<?= base_url()?>revision/generarRevision/<?=$this->uri->segment(3, 0)?>/<?=$this->uri->segment(4, 0)?>/<?=$lista->id_version?>"><span class="glyphicon glyphicon-list-alt"></span> Revisar Entregable</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
} else {
	?>
    <div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No Tiene Pendientes en Este Grupo
</div>
        <?php
}
?>