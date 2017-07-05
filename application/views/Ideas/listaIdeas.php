<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>ideas">Opciones de Ideas</a></li>
  <li class="active">Desarrollar Ideas</li>
</ol>

<?php 
if (empty($listaIdeas)) {
	?>
<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No se Encuentran Entregables Registrados
</div>
	<?php
} else {
?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nombre de Idea</th>
            <th>Acciones</th>

        </tr>
    </thead>
<?php
    foreach ($listaIdeas->result() as $ideas) {
     ?>
 <tr>
            <td><?php echo $ideas->nombre_idea; ?></td>
            <td> <a href="<?= base_url()?>ideas/mostrarMarco/<?=$ideas->id_idea?>"><span class="glyphicon glyphicon-edit"></span> Desarrollar Idea</a></td>
        </tr>
     <?php
    }
    ?>
</table>
    <?php
	}?>