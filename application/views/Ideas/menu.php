
<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li class="active">Opciones de Ideas</li>
</ol>
<?php
$this->load->view('Genericas/mensajes');
?>
<fieldset>
<ul class="list-group">
<?php 
if ($conteoideas==0) {
?>
  <li class="list-group-item"><a href="<?=base_url()?>ideas/registro">Registrar Idea</a></li>

<?php 
}
if ($conteoideas>0) {
?>
  <li class="list-group-item"><a href="<?=base_url()?>ideas/desarrollarIdea">Desarrollar Idea</a></li>
<?php 
}

if ($conteoideas==0) {
?>
  <li class="list-group-item"><a href="<?=base_url()?>ideas/ListadodeBanco">Usar Banco como Base de Idea </a></li>
  <?php 
}
?>
</ul>
</fieldset>
