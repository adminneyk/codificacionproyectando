<?php 

$id = "";
$texto = "";
$versiona= 0;
$mensaje = "";
$guarda = true;
if (!empty($versiones)) {
    foreach ($versiones->result() as $version) {
        $id = $version->id_version;
        $texto = $version->entregable;
        if($version->estado==2 || $version->estado==5){
           $guarda=false; 
        }
        if($version->comentarios!=""){
            $mensaje=$version->comentarios;
            $versiona=1;
        }
        
    }
}
?>
<form class="form-horizontal" action="<?= base_url()?>ideas/guardarVersion" method="POST">
<fieldset>
<legend>Formulario de Gestiones</legend>
<div class="form-group">
  <label class="control-label col-sm-2" for="textarea">Estructura del Entregable</label>
  <div class="col-sm-10">
    <textarea name="ckeditor" class="ckeditor form-control" id="ckeditor" rows="1"><?=$texto?></textarea>
    <p class="help-block"><span class="glyphicon glyphicon-bullhorn"></span> <?=$ayuda?></p>
    <?php 
    if($mensaje!=""){
        ?>
    <p class="help-block" style="font-weight: bold;"><span class="glyphicon glyphicon-exclamation-sign"></span> <?=$mensaje?></p>
            <?php
    }
    ?>
    
  </div>
</div>

<!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">&nbsp;</label>
            <div class="col-md-8">
            <?php if($guarda){ ?>
                <button type="submit" name="validar" id="validar" type="button" class="btn btn-success">GUARDAR</button>
                <?php } ?>
                <a href="<?= base_url() ?>ideas/historiales/<?=$this->uri->segment(3, 0)?>/<?=$this->uri->segment(4, 0)?>" class="btn btn-danger">Volver</a>
            </div>
        </div>
<input type="hidden" name="id" id="id" value="<?=$id?>">
<input type="hidden" name="idea" id="idea" value="<?=$this->uri->segment(3, 0)?>">
<input type="hidden" name="vers" id="vers" value="<?=$versiona?>">
<input type="hidden" name="entregable" id="entregable" value="<?=$this->uri->segment(4, 0)?>">
</fieldset>
</form>
