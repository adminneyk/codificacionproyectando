<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li class="active">Gestion de Cursos</li>
</ol>
<fieldset>
	<legend>Gestion de Parametrizaciones</legend>
<?php
$this->load->view('Genericas/mensajes');
?><br>
<?php 
if (empty($cursos)) {
	?>
<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span> Tiene Todos sus Grupos Parametrizados
</div>
	<?php
} else { ?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Entregable</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($cursos->result() as $curso) {
        ?>
        <tr>
            <td><?php echo $curso->nombre_grupo; ?></td>
            
            <td> <a href="<?= base_url()?>parametrizacion/formasignacionCursos/<?=$curso->id_grupo; ?>"><span class="glyphicon glyphicon-pencil"></span> Asignar Parametrizacion</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
}
?>
</fieldset>