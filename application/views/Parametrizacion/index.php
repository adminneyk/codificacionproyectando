<legend>Mis Parametrizaciones</legend>
<a href="<?=base_url()?>parametrizacion/formulario" class="btn btn-warning">Agregar Parametrización</a>
<br>
<br>
<table class="table table-condensed">
    <thead>
        <tr>

            <th>Parametrizacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($parametrizaciones->result() as $parametros) {
        ?>
        <tr>
            <td><?php echo $parametros->nom_parametrizacion; ?></td>
            <td><?php echo $parametros->descripcion_parametrizacion; ?></td>
            <td><?php 
            if($parametros->estado== 0 ){
                echo "Sin Publicar";
            } else {
                echo "Publicada";
                } ?></td>
            <td> <a href="<?= base_url()?>parametrizacion/formulario/<?=$parametros->id_parametrizacion; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
        </tr>
        <?php
    }
    ?>
</table>
    