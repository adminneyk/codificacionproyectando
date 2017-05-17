<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>reportes">Listado de Infomes</a></li>
  <li class="active"><?=$nombreinforme?></li>
</ol>



 
<script type="text/javascript">
$(document).ready(function()
	{
	$("#buscar").click(function () {
		var nombreresponsable= $("#usuario").val();
		$.ajax({
 			type: 'POST',
			 url: '<?=base_url()?>reportes/consultar', 
 			data: 'responsable='+nombreresponsable,
 			success: function(resp) { 
 			$('#divmostrar').html(resp);
 }
 });
	});		
});
</script>

<form class="form-horizontal">
<fieldset>
<legend>Filtro</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario">Nombre de Usuario</label>  
  <div class="col-md-4">
  <input name="usuario" class="form-control input-md" id="usuario" type="text" placeholder="Nombre de Usuario">
    
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