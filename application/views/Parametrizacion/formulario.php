<?php 
$nombrepara = "";
$descripcion = "";
$seleccionado = 0;
$id ="";
$faltantes ="";
if (!isset($noid)) {
    foreach ($parametrizaciones->result() as $parame) {
        $nombrepara = $parame->nom_parametrizacion;
        $descripcion = $parame->descripcion_parametrizacion;
        $seleccionado = $parame->estado;
        $id = $parame->id_parametrizacion;
    }
 
    foreach ($validador->result() as $listvali) {
        $contador = $listvali->conteo;
        $nombreactividades = $listvali->nombre_actividad;
        if($contador==0){
            $faltantes.="-{$nombreactividades}<br>";
        }
    }
    
} else {
    $faltantes = "-Todas las actividades";
}
/*SE CARGA EL FORMULARIO  Y SUS CAMPOS*/
$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);

$arrayparame = array("class" => "form-control",
    "id" => "nombrepara",
    "name" => "nombrepara",
    "placeholder" => "Nombre del Marco de Trabajo",
    "value" => $nombrepara,
    "required" => "requited",
    "pattern" =>"[A-Za-z0-9]+",
    "title" =>"Campo Alfanumerico Minimo 3 Caracteres");
$datatextarea = array(
        'name'        => 'descritarea',
        'id'          => 'descritarea',
        'value'       => $descripcion,
        'rows'        => '10',
        'cols'        => '30',
        'class'       => 'form-control'
    );
if ($faltantes){
$options = array(
        '0'         => 'NO PUBLICO'
);
} else {
$options = array(
        '0'         => 'NO PUBLICO',
        '1'           => 'PUBLICADO'
);
}
$selected = array($seleccionado);
echo form_open(base_url() . 'parametrizacion/validar', $arrayform);
?>

<script type="text/javascript">
$(document).ready(function()
  {
  $("#validar").click(function () {
    var nombrepara= $("#nombrepara").val();
    var descritarea= $("#descritarea").val();
    var msg="";
    if(nombrepara=="" ){
        msg+="-Nombre del Marco de Trabajo Requerida<br>";
    }  
    if(descritarea==""){
        msg+="-Descripción del Marco de Trabajo Requerida";
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
<legend>Marco de Trabajo</legend>
<div id="error"></div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de Marco de Trabajo</label>  
  <div class="col-md-4">
  <?php
                echo form_input($arrayparame);
                echo form_error('nombrepara', '<div class="alert alert-danger">', '</div>');
                ?>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Descripción del Marco de Trabajo</label>
  <div class="col-md-4">                     
    <?php
                echo form_textarea($datatextarea);
                echo form_error('descritarea', '<div class="alert alert-danger">', '</div>');
                ?>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Publicar </label>
  <div class="col-md-4">
   
        <?php 
            echo form_dropdown('publicacion', $options, $selected,'class="form-control" id="publicacion"');
        ?>
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
      <input type="hidden" name="id" id="id" value="<?= $id; ?>"> 
       
        <?php if($faltantes){?>
       <div class="alert alert-info" role="alert">
            <?php
            echo "<span class='glyphicon glyphicon-bell'></span>  <strong>Para cambiar de estado debe <br>agregar entregables a las siguientes actividades</strong><br> {$faltantes}";
        ?>
       </div>
            <?php
            
            }?>
       
    <button  name="validar" id="validar" type="button" class="btn btn-success">GUARDAR</button>
    <a href="<?= base_url() ?>parametrizacion" class="btn btn-danger">Volver</a>
  </div>
</div>
</fieldset>
</form>