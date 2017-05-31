
<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li class="active">Mis  Grupos</li>
</ol>
<fieldset>
	<legend>Mis Grupos</legend>
</fieldset>
<?php
$this->load->view('Genericas/mensajes');
if($listagrupos!=null) {
?><ul class="list-group">
<?php
foreach ($listagrupos->result() as $grupos) {
?>
<li class="list-group-item"><a href="banco/bancoIdeas/<?=$grupos->id_grupo?>"><?=$grupos->nombre_grupo?></a></li>
<?php
}
?>
</ul>
<?php
} else {
	?>
    <div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No Tiene Grupos como Responsable
</div>
        <?php
}
?>