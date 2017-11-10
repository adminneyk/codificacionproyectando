<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>reportes">Listado de Infomes</a></li>
  <li class="active"><?=$nombreinforme?></li>
</ol>



 
<script type="text/javascript">
$(document).ready(function()
	{
            $('#divmostrar').html('');
	$("#buscar").click(function () {
		var idpara= $("#idpara").val();
		$.ajax({
 			type: 'POST',
			 url: '<?=base_url()?>reportes/consultar', 
 			data: 'id='+idpara,
 			success: function(resp) { 
 			$('#divmostrar').html(resp);
 }
 });
	});		
});
</script>

<form class="form-horizontal">
<fieldset>
<legend>Parametrizaciones</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario">Parametrizacion</label>  
  <div class="col-md-4">
      <select id="idpara" name="idpara" class="form-control">
      
      
      <?php

if (!empty($para)) {
    foreach ($para->result() as $pendiente) {
        ?>
      <option value="<?= $pendiente->id_parametrizacion; ?>"><?= $pendiente->nom_parametrizacion; ?> </option><?php
                }
                }
            ?>
      </select>
      
      
      
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="buscar" class="btn btn-warning" id="buscar" type="button">Buscar</button>
  </div>
</div>
</fieldset>
</form>
<div id="divmostrar"></div>