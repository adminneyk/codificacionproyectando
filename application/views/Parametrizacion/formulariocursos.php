<?php
$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);

echo form_open(base_url() . 'parametrizacion/asigParamBase', $arrayform);
?>
<script type="text/javascript">
$(document).ready(function()
  {
  $("#validar").click(function () {
     $("#form").submit();
      });
    
    }); 
</script>
<fieldset>

    <!-- Form Name -->
    <legend>Formulario de Entregable</legend>
    <div id="error"></div>
    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Parametrización</label>
        <div class="col-md-4">
            <select class="form-control" id="publicacion" name="publicacion">
            <?php 
            foreach ($parame->result() as $param) {
    echo "<option value='".$param->id_parametrizacion."'>".$param->nom_parametrizacion."</option>";
     
    }
               
            ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="idgrupo" id="idgrupo" value="<?= $grupo; ?>">
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="button1id"></label>
        <div class="col-md-8">
            <button name="validar" id="validar" type="button" class="btn btn-success">Guardar</button>
            <button onclick="validarVolver('<?= base_url() ?>parametrizacion/parametrizarCursos','')" class="btn btn-danger" type="button">Volver</button>
        </div>
    </div>

</fieldset>
</form>
