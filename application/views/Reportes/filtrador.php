<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>reportes">Listado de Infomes</a></li>
  <li class="active"><?=$nombreinforme?></li>
</ol>



 
<script type="text/javascript">
$(document).ready(function()
	{
	$("#boton02").click(function () {
		var nombreresponsable= $("#nombre2").val();
		$.ajax({
 			type: 'POST',
			 url: '<?=base_url()?>reportes/consultar', 
 			data: 'dato='+nombreresponsable,
 			success: function(resp) { 
 			$('#divmostrar').html(resp);
 }
 });

		
	//saco el valor accediendo a un input de tipo text y name = nombre2 y lo asigno a uno con name = nombre3 
	});		
});
</script>
<input type="text" name="nombre2" id="nombre2" class="nombre2" value=""> 
<input type="button" name="boton02" id="boton02" value="Asginar al input 2 el valor del primero">
<div id="divmostrar"></div>