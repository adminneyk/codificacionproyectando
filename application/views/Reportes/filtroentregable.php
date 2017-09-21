<ol class="breadcrumb">
    <li><a href="<?= base_url() ?>home">Home</a></li>
    <li><a href="<?= base_url() ?>reportes">Listado de Infomes e Indicadores</a></li>
    <li class="active"><?= $nombreinforme ?></li>
</ol>




<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#divmostrar").html("");
        $("#buscar").click(function () {
            var idea = $('#idea').val();
            var parametrizaciones = $('#parametrizaciones').val();
            
            $.post("<?= base_url() ?>reportes/analizadorEntregable", {parametrizaciones: parametrizaciones}, function (mensaje) {
                $("#divmostrar").html("<h2>Versiones por Entregables</h2><br>"+mensaje);
            });
        });
    });
</script>

<form class="form-horizontal">
    <fieldset>
        <legend>Filtro de Fases</legend>
        <!-- Multiple Radios -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="radios">Nombre de la Parametrización</label>
            <div class="col-md-4">
                <select class="form-control" id="parametrizaciones" name="parametrizaciones">
                    <option value="0">Seleccione</option>

                    <?php
                    foreach ($parametrizaciones->result() as $listparam) {
                        $id_parametrizacion = $listparam->id_parametrizacion;
                        $nom_parametrizacion = $listparam->nom_parametrizacion;
                        ?>
                        <option value="<?= $id_parametrizacion ?>"><?= $nom_parametrizacion ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button name="buscar" class="btn btn-warning" id="buscar" type="button">Buscar</button>
            </div>
        </div>
    </fieldset>
</form>
<div id="divmostrar"></div>