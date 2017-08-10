<?php
$id = "";
$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);
$arrayperfil = array("class" => "form-control",
    "id" => "nombreidea",
    "name" => "nombreidea",
    "placeholder" => "Nombre Idea",
    "value" => '',
    "required" => "required",
    "pattern" => "[A-Za-z0-9]{3}",
    "title" => "Campo Alfanumerico Minimo 3 Caracteres");
$descripciondeidea = array(
    'name' => 'descripidea',
    'id' => 'descripidea',
    'value' => '',
    'rows' => '10',
    'cols' => '30',
    'class' => 'form-control'
);

echo form_open(base_url() . 'ideas/validar', $arrayform);
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
            /* var valida=0;
             $("#integrantes[] option:selected").each(function() {			
             valida++;		
             });
             if(valida != 3){
             msg += "-Idea con 3 integrantes Requeridos<br>"; 
             }*/
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

        <div class="form-group">
            <label class="col-md-4 control-label" for="selectmultiple">Linea Tematica</label>
            <div class="col-md-4">
                <select id="linea" name="linea" class="form-control">
                    <?php
                    foreach ($lineas->result() as $linea) {
                        ?>
                        <option value="<?= $linea->id_linea ?>"><?= $linea->nombre_linea ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>


        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">&nbsp;</label>
            <div class="col-md-8">
                <button name="validar" id="validar" type="button" class="btn btn-success">GUARDAR</button>
                <button name="enviar" id="enviar" type="button" class="btn btn-danger" onclick="validarVolver('<?= base_url() ?>ideas', '');">VOLVER</button>

            </div>
        </div>
    </fieldset>
    <input type="hidden" name="id" id="id" value="<?= $id; ?>"> 
</form>
<?php ?>