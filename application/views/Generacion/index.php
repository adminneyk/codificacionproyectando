<?php
 header('Content-type: application/vnd.ms-word');
 header("Content-Disposition: attachment; filename=hola.doc");
 header("Pragma: no-cache");
 header("Expires: 0");?>
<ul>
<?php 
foreach ($datos as $key => $listdatos) { 
?>
<li>Fase <?php echo $listdatos['nombrefase'];
?>
</li>
<ul>
    <?php foreach ($listdatos['actividades'] as $key => $listactividades) { ?>
           <li>
            <?=$listactividades['nombreactividad'];?>
            </li>
            <ul>
                  <?php foreach ($listactividades['entregables'] as $key => $listentregables) { ?>
                    
                    <li><?=$listentregables['nombre_entregable'];?>
                    </li>
                    <ul>
                        <li><?=$listentregables['entregable'];?>
                    </li>
                    </ul>
                    <?php } ?>
                    </ul>
    <?php } ?>
    </ul>
<?php
 } ?>
 </ul>