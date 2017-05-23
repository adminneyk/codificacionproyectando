<table>
<?php foreach ($datos as $key => $listdatos) { ?>

<tr>
<td>
Fase <?php echo $listdatos['nombrefase'];?>
</td>
</tr>
 <?php foreach ($listdatos['actividades'] as $llave => $actividades) { ?>

  <?php } ?>
<tr>
 <td>
   <?php echo $actividades['nombreactividad']; ?>
                    </td>
</tr>

<?php } ?>
</table>





<?php foreach ($datos as $key => $listdatos) { ?>
<div class="panel panel-default">
    <div class="panel-heading">Fase <?php echo $listdatos['nombrefase'];?> </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Actividad
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Actividades Configuradas
                    </th>
                    <th>
                        Admin  Entregables
                    </th>
                </tr>
            </thead>
            <tr>
            <?php foreach ($listdatos['actividades'] as $llave => $actividades) { ?>


                    <td>
                        <?php echo $actividades['nombreactividad']; ?>
                    </td>
                    <td>
                        Descripcion
                    </td>
                    <td>
                    <?php
                      if ($actividades['cantidadact']>0) {
                        ?>
                         <span class="label label-warning"><strong><?=$actividades['cantidadact']?></strong> Actividades Configuradas</span>
                         <?php
                      } else {
                        ?>
                         <span class="label label-danger"><strong><?=$actividades['cantidadact']?></strong> Actividades Configuradas</span>
                         <?php

                      }
                 ?>
                    </td>
                    <td> <a href="<?= base_url()?>parametrizacion/adminentregables/<?=$actividades['id_actividad']?>/<?=$id?>"><span class="glyphicon glyphicon-list-alt"></span> Configurar</a></td>
                </tr>
                <?php } ?>
        </table>
    </div>
</div>
 <?php
}
?>