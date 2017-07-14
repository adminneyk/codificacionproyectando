
<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>revision">Mis Grupos</a></li>
  <li class="active">Reviones Pendientes</li>
</ol>
<fieldset>
	<legend>Reviones Pendientes</legend>
</fieldset>
<?php
$this->load->view('Genericas/mensajes');
if($listaconteo!=null) {
    ?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nombre de la Idea</th>
            <th>Entregables por Validar</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($listaconteo->result() as $lista) {
        ?>
        <tr>
            <td><?php echo $lista->nombre_idea; ?></td>
            <td><?php echo $lista->conteo; ?></td>
            <td> <a href="<?= base_url()?>revision/verificar/<?=$lista->id_grupo?>/<?=$lista->id_idea?>"><span class="glyphicon glyphicon-list-alt"></span> Revisar Entregable</a></td>
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