<?php
$idperfil = "";
$nombreperfil = "";
$permisos = "";
$id = "";
$arraypermisos = array();
if (isset($_GET['id']) && isset($listaperfiles)) {
    $id=$_GET['id'];
    foreach ($listaperfiles->result() as $perfil) {
        $idpefil = $perfil->id_perfil;
        $nombreperfil = $perfil->nombre_perfil;
        $permisos = $perfil->permisos;
    }
    

    $permisos = explode(",", $permisos);
    for ($y = 0; $y < count($permisos); $y++) {
        array_push($arraypermisos, $permisos[$y]);
    }
}
$arrayform = array(
    "class" => "form-horizontal"
);
$arrayperfil = array("class" => "form-control",
    "id" => "perfil",
    "name" => "perfil",
    "placeholder" => "Nombre Perfil",
    "value" => $nombreperfil);

function validar($valor, $arraypermisos) {
    return in_array($valor, $arraypermisos);
}

$dataperfiles = array(
    'name' => 'permisos[]',
    'id' => 'permisos[]',
    'value' => 'perfiles',
    'checked' => validar('perfiles', $arraypermisos)
);
$datausuarios = array(
    'name' => 'permisos[]',
    'id' => 'permisos[]',
    'value' => 'usuarios',
    'checked' => validar('usuarios', $arraypermisos)
);
$dataideas = array(
    'name' => 'permisos[]',
    'id' => 'permisos[]',
    'value' => 'ideas',
    'checked' => validar('ideas', $arraypermisos)
);
$datareportes = array(
    'name' => 'permisos[]',
    'id' => 'permisos[]',
    'value' => 'reportes',
    'checked' => validar('reportes', $arraypermisos)
);
$dataparametrizacion = array(
    'name' => 'permisos[]',
    'id' => 'permisos[]',
    'value' => 'parametrizacion',
    'checked' => validar('parametrizacion', $arraypermisos)
);

echo form_open(base_url() . 'perfiles/validar', $arrayform);
?>

<form class="perfiles">
    <fieldset>
        <!-- Form Name -->
        <legend>Perfil</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nombre de Perfil</label>  
            <div class="col-md-4">
<?php echo form_input($arrayperfil);
echo form_error('clave', '<div class="alert alert-danger">', '</div>');
?>
            </div>
        </div>

        <!-- Multiple Checkboxes -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">PERFILES</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="checkboxes-0">
<?php
echo form_checkbox($dataperfiles);
?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">USUARIOS</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="checkboxes-0">
<?php
echo form_checkbox($datausuarios);
?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">IDEAS</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="checkboxes-0">
<?php
echo form_checkbox($dataideas);
?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">REPORTES</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="checkboxes-0">
<?php
echo form_checkbox($datareportes);
?>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">PARAMETRIZACIÓN</label>
            <div class="col-md-4">
                <div class="checkbox">
                    <label for="checkboxes-0">
<?php
echo form_checkbox($dataparametrizacion);
?>
                    </label>
                </div>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">&nbsp;</label>
            <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success" type="submit">GUARDAR</button>
                <a href="<?= base_url() ?>perfiles" class="btn btn-dange">Volver</a>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="id" id="id" value="<?=$id;?>"> 
</form>
<?php ?>