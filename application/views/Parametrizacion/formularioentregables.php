<?php
$nombreentregable = "";
$descripcion = "";
$seleccionado = 0;
$id="";
$descripciontextoayuda="";


$arraypermisos = array();

if($this->uri->segment(5, 0) &&  isset($entregables)){
foreach ($entregables->result() as $mientregable) {
        $nombreentregable = $mientregable->nombre_entregable ;
        $descripcion = $mientregable->descripcion_entregable;
        $seleccionado = $mientregable->estado;
        $id = $mientregable->id_entregable;
        $descripciontextoayuda = $mientregable->texto_ayuda;
    }

}

/*
entregables
*/


$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);
$arraynomentregable = array("class" => "form-control",
    "id" => "nomentregable",
    "name" => "nomentregable",
    "placeholder" => "Nombre de Entregable",
    "value" => $nombreentregable);
$datatextarea = array(
    'name' => 'descrientregable',
    'id' => 'descrientregable',
    'value' => $descripcion,
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);
$datatextareaayuda = array(
    'name' => 'textoayuda',
    'id' => 'textoayuda',
    'value' => $descripciontextoayuda,
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);
$options = array(
        '0'         => 'INACTIVO',
        '1'           => 'ACTIVO'
);
$selected = array($seleccionado);
echo form_open(base_url() . 'parametrizacion/validarentregable', $arrayform);
?>
<script type="text/javascript">
$(document).ready(function()
  {
  $("#validar").click(function () {
    var nomentregable= $("#nomentregable").val();
    var descrientregable= $("#descrientregable").val();
    var msg="";
    if(nomentregable=="" ){
        msg+="-Nombre del Entregable Requerido<br>";
    }  
    if(descrientregable==""){
        msg+="-Descripcion del Entregable Requerida";
    }
      if(msg){
        $("#error").html('<span class="glyphicon glyphicon-bell"></span><strong>Tiene los Siguientes Problemas:</strong><br>'+msg);
        $("#error").addClass('alert alert-warning');
      } else {
          $("#form").submit();
      }
    
    });
 }); 
</script>
<fieldset>

    <!-- Form Name -->
    <legend>Formulario de Entregable</legend>
    <div id="error"></div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Entregable</label>  
        <div class="col-md-4">
            <?php
            echo form_input($arraynomentregable);
            echo form_error('nomentregable', '<div class="alert alert-danger">', '</div>');
            ?>
        </div>
    </div>
    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Descripcion de Entregable</label>
        <div class="col-md-4">                     
            <?php
            echo form_textarea($datatextarea);
            echo form_error('descrientregable', '<div class="alert alert-danger">', '</div>');
            ?>
        </div>
    </div>
    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Texto de Ayuda</label>
        <div class="col-md-4">                     
            <?php
            echo form_textarea($datatextareaayuda);
            echo form_error('textoayuda', '<div class="alert alert-danger">', '</div>');
            ?>
        </div>
    </div>    

    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Estado</label>
        <div class="col-md-4">
            <?php 
                echo form_dropdown('publicacion', $options, $selected,'class="form-control" id="publicacion"');
            ?>
        </div>
    </div>
    <input type="hidden" name="actividad" id="actividad" value="<?= $idactividad; ?>">
    <input type="hidden" name="parametrizacion" id="parametrizacion" value="<?=$idparametrizacion; ?>">
    <input type="hidden" name="id" id="id" value="<?=$id;?>">
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="button1id"></label>
        <div class="col-md-8">
            <button name="validar" id="validar" type="button" class="btn btn-success">Guardar</button>
            <a href="<?= base_url() ?>parametrizacion/adminentregables/<?= $idactividad ?>/<?= $idparametrizacion ?>" class="btn btn-danger">Volver</a>
        </div>
    </div>

</fieldset>
</form>
