<?php 

$id = "";
$texto = "";
$guarda = true;
if (!empty($versiones)) {
    foreach ($versiones->result() as $version) {
        $id = $version->id_version;
        $texto = $version->entregable;
        if($version->estado==2){
           $guarda=false; 
        }
    }
}
?>
<form class="form-horizontal" action="<?= base_url()?>ideas/guardarVersion" method="POST">
<fieldset>
<legend>Forrmulario de Gestiones</legend>
<div class="form-group">
  <label class="control-label col-sm-2" for="textarea">Textarea</label>
  <div class="col-sm-10">
    <textarea name="ckeditor" class="ckeditor form-control" id="ckeditor" rows="1"><?=$texto?></textarea>
    <p class="help-block"><?=$ayuda?></p>
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
<input type="hidden" name="entregable" id="entregable" value="<?=$this->uri->segment(4, 0)?>">
</fieldset>
</form>
