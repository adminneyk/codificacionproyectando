<?php 
if ($this->session->flashdata('correcto')) {
	?>
	<div class="alert alert-success" role="alert">
	<span class="glyphicon glyphicon-ok"></span> <?php echo  $this->session->flashdata('correcto') ;
	?>
	</div>
	<?php
}
if ($this->session->flashdata('error')) {
	?>
	<div class="alert alert-warning" role="alert">
	<span class="glyphicon glyphicon-remove"></span> <?php echo  $this->session->flashdata('error') ;
	?>
	</div>
	<?php
}

?>