<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>banco">Mis  Grupos</a></li>
  <li class="active">Grupo</li>
</ol>
<fieldset>
	<legend>Ideas No Clasificadas del Grupo</legend>
<?php
$this->load->view('Genericas/mensajes');
?><br>
<?php 
if ($ideasgrupo==null) {
	?>
<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No se Encuentran Pendientes en este Grupo
</div>
	<?php
} else { ?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nombre Idea</th>
            <th>Descripcion Idea</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($ideasgrupo->result() as $idea) {
        ?>
        <tr>
            <td><?php echo $idea->nombre_idea; ?></td>
            <td><?php echo $idea->descripcion_idea; ?></td>
            <td> <a href="<?= base_url()?>banco/aprobar/<?=$idea->id_grupo?>/<?=$idea->id_idea?>/3"><span class="glyphicon glyphicon-play"></span> Aprobar</a></td>
            <td> <a href="<?= base_url()?>banco/aprobar/<?=$idea->id_grupo?>/<?=$idea->id_idea?>/2"><span class="glyphicon glyphicon-stop"></span> Rechazar</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
}
?>
</fieldset>