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
    "class" => "form-horizontal"
);

$arrayparame = array("class" => "form-control",
    "id" => "nombrepara",
    "name" => "nombrepara",
    "placeholder" => "Nombre de Parametrización",
    "value" => $nombrepara);
$datatextarea = array(
        'name'        => 'descritarea',
        'id'          => 'descritarea',
        'value'       => $descripcion,
        'rows'        => '10',
        'cols'        => '30',
        'class'       => 'form-control'
    );

$options = array(
        '0'         => 'NO PUBLICO',
        '1'           => 'PUBLICADO'
);
$selected = array($seleccionado);
echo form_open(base_url() . 'parametrizacion/validar', $arrayform);

/**/
?>

<fieldset>

<!-- Form Name -->
<legend>Parametrización</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de Parametrizacion</label>  
  <div class="col-md-4">
  <?php
                echo form_input($arrayparame);
                echo form_error('nombrepara', '<div class="alert alert-danger">', '</div>');
                ?>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Descripcion</label>
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
       <div class="alert alert-danger" role="alert">
            <?php
            echo "<strong>Para cambiar de estado debe <br>agregar entregables a las siguientes actividades</strong><br> {$faltantes}";
        ?>
       </div>
            <?php
            
            }?>
       
    <button id="button1id" name="button1id" class="btn btn-success">GUARDAR</button>
    <a href="<?= base_url() ?>parametrizacion" class="btn btn-dange">Volver</a>
  </div>
</div>
</fieldset>
</form>