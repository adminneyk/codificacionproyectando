<table style="border-collapse: collapse;" border="1px solid">
<?php foreach ($datos as $key => $listdatos) { ?>
<tr>
<td>
Fase <?php echo $listdatos['nombrefase'];?>
</td>
<td>
<table>
    <?php foreach ($listdatos['actividades'] as $key => $listactividades) { ?>
            <tr>
            <td>
            <?=$listactividades['nombreactividad'];?>
            </td>
            <td>
            <table>
                  <?php foreach ($listactividades['entregables'] as $key => $listentregables) { ?>
                    <tr>
                    <td><?=$listentregables['nombre_entregable'];?></td>
                    </tr>
                    <?php } ?>
            </table>
            </td>
            </tr>

    <?php } ?>
</table>
</td>
</tr>
<?php } ?>
</table>



