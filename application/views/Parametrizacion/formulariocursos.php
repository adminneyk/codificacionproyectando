<?php
$arrayform = array(
    "class" => "form-horizontal",
    "id" => "form"
);

echo form_open(base_url() . 'parametrizacion/asigDataparam', $arrayform);
?>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#validar").click(function () {
            var publicacion = $("#publicacion").val();
            var profesor = $("#profesor").val();
            var msg = "";
            if (profesor == 0) {
                msg += "-Marco de Trabajo Obligatorio<br>";
            }

            if (publicacion == 0) {
                msg += "-Materia Obligatoria<br>";
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
<fieldset>

    <!-- Form Name -->
    <legend>Formulario de Gestión de Materias</legend>
    <div id="error"></div>
    <?php
        $this->load->view('Genericas/mensajes');
?>
    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Materias</label>
        <div class="col-md-4">
            <select class="form-control" id="publicacion" name="publicacion">
                <option value="0">Seleccione</option>
                <?php
                foreach ($materias->result() as $materia) {
                    if (!in_array($materia->MAT_CODIGO, $materiasconfig)) {

                        echo "<option value='" . $materia->MAT_CODIGO . "'>" . $materia->MAT_NOMBRE . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Marco de Trabajo</label>
        <div class="col-md-4">
            <select class="form-control" id="profesor" name="profesor">
                <option value="0">Seleccione</option>
                <?php
                if ($parametrizaciones != null) {
                    foreach ($parametrizaciones->result() as $param) {

                        echo "<option value='" . $param->id_parametrizacion . "'>" . $param->nom_parametrizacion . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="button1id"></label>
        <div class="col-md-8">
            <button name="validar" id="validar" type="button" class="btn btn-success">Asignar Marco a Materia</button>

        </div>
    </div>
</form>
</fieldset>
