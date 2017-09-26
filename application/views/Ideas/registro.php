<?php
if(isset($generabanco)){
    $datostipog = 1;
} else{
    $datostipog = 0;
}


$id = "";
$nombre = "";
$descripcion = "";
$objgeneral = "";
$objespecificos = "";
$linea = "";


if(isset($ideabanco)){
    
    foreach ($ideabanco->result() as $parametros) {
        $nombre = $parametros->nombre_idea; 
          $descripcion = $parametros->descripcion_idea; 
           $objgeneral =  $parametros->objetivo_general;
           $objespecificos =  $parametros->objetivo_especifico; 
           $linea =  $parametros->id_linea; 
            
    }
}

$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);
$arrayperfil = array("class" => "form-control",
    "id" => "nombreidea",
    "name" => "nombreidea",
    "placeholder" => "Nombre Idea",
    "value" => $nombre,
    "required" => "required",
    "pattern" => "[A-Za-z0-9]{3}",
    "title" => "Campo Alfanumerico Minimo 3 Caracteres");
$descripciondeidea = array(
    'name' => 'descripidea',
    'id' => 'descripidea',
    'value' => $descripcion,
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);
$objetivogeneral = array(
    'name' => 'objetivogeneral',
    'id' => 'objetivogeneral',
    'value' => $objgeneral,
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);

$objetivoespecifico = array(
    'name' => 'objetivoespecifico',
    'id' => 'objetivoespecifico',
    'value' => $objespecificos,
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);

echo form_open(base_url() . 'ideas/validar/'.$datostipog, $arrayform);
?>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#validar").click(function () {
            var nombreidea = $("#nombreidea").val();
            var descripidea = $("#descripidea").val();
            var integrantes = $("#integrantes").val();
            var msg = "";
            if (nombreidea == "") {
                msg += "-Nombre de Idea Requerido<br>";
            }

            if (descripidea == "") {
                msg += "-Descripcion de la Idea Requerido<br>";
            }
            if (msg) {
                $("#error").html('<span class="glyphicon glyphicon-bell"></span><strong>Tiene los Siguientes Problemas:</strong><br>' + msg);
                $("#error").addClass('alert alert-warning');
            } else {
                $("#form").submit();
            }

        });
    });
</script>
<form class="perfiles">
    <fieldset>
        <!-- Form Name -->
        <legend>Registro de Idea</legend>
        <div id="error"></div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nombre de la Idea</label>  
            <div class="col-md-4">
                <?php
                echo form_input($arrayperfil);
                echo form_error('nombreidea', '<div class="alert alert-danger">', '</div>');
                ?>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Descripcion de la Idea</label>
            <div class="col-md-4">                     
                <?php
                echo form_textarea($descripciondeidea);
                echo form_error('descripidea', '<div class="alert alert-danger">', '</div>');
                ?>
            </div>
        </div> 
        <?php if($datostipog == 0) {
            ?>
        <!-- Select Multiple -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectmultiple">Integrantes del Grupo</label>
            <div class="col-md-4">
                <select multiple id="integrantes[]" name="integrantes[]" class="form-control">
                    <?php
                    foreach ($listaestudiantes->result() as $lista) {
                        ?>
                        <option value="<?= $lista->id_usuario ?>" <?php if ($lista->id_usuario == $this->session->userdata('id_usuario')) { ?> selected="selected" <?php } ?>><?= $lista->nombre_usuario ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        
        </div>
        <?php }
            ?>

        <div class="form-group">
            <label class="col-md-4 control-label" for="selectmultiple">Linea Tematica</label>
            <div class="col-md-4">
                <select id="linea" name="linea" class="form-control">
                    <?php
                    foreach ($lineas->result() as $linea) {
                        ?>
                    <option value="<?= $linea->id_linea ?>" <?php if($linea==$linea->id_linea) { ?> selected="selected" <?php } ?>><?= $linea->nombre_linea ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
       
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Objetivo General</label>
            <div class="col-md-4">                     
                <?php
                echo form_textarea($objetivogeneral);
                echo form_error('objetivogeneral', '<div class="alert alert-danger">', '</div>');
                ?>
            </div>
        </div>
 <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Objetivo Especifico</label>
            <div class="col-md-4">                     
                <?php
                echo form_textarea($objetivoespecifico);
                echo form_error('objetivoespecifico', '<div class="alert alert-danger">', '</div>');
                ?>
            </div>
        </div>
        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">&nbsp;</label>
            <div class="col-md-8">
                <button name="validar" id="validar" type="button" class="btn btn-success">GUARDAR</button>
                <?php 
                if($datostipog ==1){
                    $volver = "home";
                } else {
                    $volver = "ideas";
                }
                ?>
                <button name="enviar" id="enviar" type="button" class="btn btn-danger" onclick="validarVolver('<?= base_url().$volver ?>', '');">VOLVER</button>

            </div>
        </div>
    </fieldset>
    <input type="hidden" name="id" id="id" value="<?= $id; ?>"> 
</form>
<?php ?>