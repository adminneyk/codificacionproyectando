<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>reportes">Listado de Infomes</a></li>
  <li class="active"><?=$nombreinforme?></li>
</ol>



 
<script type="text/javascript">
$(document).ready(function()
	{
   $('#divmostrar').html('');
   $("#parametrizaciones").change(function () {
    $('#idea').html('<option value="">Seleccione Idea</option>');
    var parametrizaciones= $("#parametrizaciones").val();
    $.ajax({
      type: 'POST',
       url: '<?=base_url()?>reportes/consultarIdeas', 
      data: 'parametrizacion='+parametrizaciones,
      success: function(resp) {
      $('#idea').html(resp).fadeIn(); 
 }
 });
  });   

	$("#buscar").click(function () {
		var idea= $('#idea').val();
		$.ajax({
 			type: 'POST',
			 url: '<?=base_url()?>reportes/consultarEstadoProyecto', 
 			data: 'idea='+idea,
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
<!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Nombre de la Parametrización</label>
        <div class="col-md-4">
            <select class="form-control" id="parametrizaciones" name="parametrizaciones">
              <option value="0">Seleccione</option>

             <?php 
              foreach ($parametrizaciones->result() as $listparam) {
                $id_parametrizacion = $listparam->id_parametrizacion;
                $nom_parametrizacion = $listparam->nom_parametrizacion;
                ?>
                <option value="<?=$id_parametrizacion?>"><?=$nom_parametrizacion?></option>
                <?php
              }
    ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Nombre de la Idea</label>
        <div class="col-md-4">
            <select class="form-control" id="idea" name="idea">
            <option value="">Seleccione Idea</option>
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