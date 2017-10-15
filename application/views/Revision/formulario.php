<?php 
$contenido = "";
$comentario = "";
$id ="";
$ididea ="";
$idgrupo =$this->uri->segment(3, 0);
    foreach ($registros->result() as $entregable) {
        $contenido = $entregable->entregable;
        $comentario = $entregable->comentarios;
        $ididea=$entregable->id_idea;
        $id = $entregable->id_version;
    }
 
    
/*SE CARGA EL FORMULARIO  Y SUS CAMPOS*/
$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);

$datatextarea = array(
        'name'        => 'ckeditor',
        'id'          => 'ckeditor',
        'value'       => $contenido,
        'rows'        => '100',
        'cols'        => '300',
        'class'       => 'ckeditor form-control'
    );
$datatextarea2 = array(
        'name'        => 'revision',
        'id'          => 'revision',
        'value'       => $comentario,
        'rows'        => '10',
        'cols'        => '30',
        'class'       => 'form-control'
    );
$options = array(        
        '4'           => 'DEVOLVER',
        '3'         => 'APROBAR'
    );

echo form_open(base_url() . 'revision/revisaEntregable', $arrayform);
?>

<script type="text/javascript">
$(document).ready(function()
  {
  $("#validar").click(function () {
     var msg="";
     var revision= $("#revision").val();
     if(revision ==""){
        msg+="-Debe Realizar un Comentario sobre la version";
     }
    
    if(msg){
        $("#error").html('<span class="glyphicon glyphicon-bell"></span><strong>Tiene los Siguientes Problemas:</strong><br>'+msg);
        $("#error").addClass('alert alert-warning');
      } else {
          
          var txt;
var r = confirm("¿Desea Guardar la Revision?");
if (r == true) {
    $("#form").submit();
} 
          
          
      }
     
    });
 }); 
</script>
<fieldset>
<legend>Entregable </legend>
<div id="error"></div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="textarea">contenido Enviado</label>
  <div class="col-md-9">                     
    <?php
                //echo form_textarea($datatextarea);
                //echo form_error('descritarea', '<div class="alert alert-danger">', '</div>');
                ?>
      
      <textarea name="ckeditor" class="ckeditor form-control" id="ckeditor" rows="1"><?=$contenido?></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-md-2">     
    
  </div>
    
  <div class="col-md-2">   
      <?php 
                $version = $this->uri->segment(5, 0);
      ?>
      
      <a href="<?= base_url() ?>revision/verHistorial/<?=$version?>/<?=$idea?>" target="popup" class="btn btn-warning" onClick="window.open(this.href, this.target, 'width=1400,height=700'); return false;">Ver Historial de Versiones</a>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="textarea">Comentarios</label>
  <div class="col-md-9">                     
    <?php
                echo form_textarea($datatextarea2);
                echo form_error('revision', '<div class="alert alert-danger">', '</div>');
                ?>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="selectbasic">Publicar </label>
  <div class="col-md-4">
   
        <?php 
            echo form_dropdown('publicacion', $options, '','class="form-control" id="publicacion"');
        ?>
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
      <input type="hidden" name="id" id="id" value="<?= $id;?>">
      <input type="hidden" name="grupo" id="grupo" value="<?= $idgrupo;?>">
      <input type="hidden" name="idea" id="idea" value="<?= $ididea;?>">
    <button  name="validar" id="validar" type="button" class="btn btn-success">GUARDAR</button>
    <a href="<?= base_url() ?>revision/verificar/<?= $idgrupo;?>/<?= $ididea;?>" class="btn btn-danger">Volver</a>
  </div>
</div>
</fieldset>
</form>

<script type="text/javascript">
	
var editor = CKEDITOR.replace( 'ckeditor', {
    filebrowserBrowseUrl : '<?=base_url()?>application/libraries/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?=base_url()?>application/libraries/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?=base_url()?>application/libraries/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?=base_url()?>application/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?=base_url()?>application/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?=base_url()?>application/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    
});
CKFinder.setupCKEditor( editor, '../' );
</script>