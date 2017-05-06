<legend>Lista de Perfiles</legend>
<a href="<?=base_url()?>perfiles/formulario" class="btn btn-warning">Agregar Perfil</a>
<br>
<br>
<table class="table table-condensed">
    <thead>
        <tr>

            <th>Identificador</th>
            <th>Nombre Perfil</th>
            <th>Modulos Permitidos</th>
            <th colspan="2">Acciones</th>

        </tr>
    </thead>
    <?php
    foreach ($listaperfiles->result() as $perfil) {
        ?>
        <tr>
            <td><?php echo "PER0" . $perfil->id_perfil; ?></td>
            <td><?php echo $perfil->nombre_perfil; ?></td>
            <td><?php echo $perfil->permisos; ?></td>
            <td> <a href="<?= base_url()?>perfiles/formulario/?id=<?=$perfil->id_perfil; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
            <td>Inactivar</td>
        </tr>
        <?php
    }
    ?>
</table>


