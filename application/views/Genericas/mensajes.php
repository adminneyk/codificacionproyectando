<?php 
if ($this->session->flashdata('correcto')) {
	?>
	<div class="alert alert-success" role="alert">
	<span class="glyphicon glyphicon-ok"></span> <?php echo  $this->session->flashdata('correcto') ;
	?>
	</div>
	<?php
}

?>