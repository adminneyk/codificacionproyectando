<table class="table table-bordered">
<thead>
    <tr>
        <th>Fases</th>
        <th>Resumen de Actividades</th>
        <th>Avance Actual</th>
    </tr>
</thead>
<?php foreach ($datos as $key => $listdatos) { ?>
<tr>
<td>
Fase <?php echo $listdatos['nombrefase'];?>
</td>
<td>
 <table class="table table-bordered">
 <thead>
     <tr>
         <th>Nombre de Actividad</th>
         <th>Resumen de Entregables</th>
         <th>Avance de la Actividad</th>
     </tr>
 </thead>
    <?php foreach ($listdatos['actividades'] as $key => $listactividades) { ?>
            <tr>
            <td>
            <?=$listactividades['nombreactividad'];?>
            </td>
            <td>
            <table class="table table-bordered">
            <thead>
     <tr>
         <th>Nombre de Entregable</th>
         <th>Versiones Generadas</th>
         <th>Estado Entregable</th>
     </tr>
 </thead>
                  <?php foreach ($listactividades['entregables'] as $key => $listentregables) { ?>
                    <tr>
                    <td><?=$listentregables['nombre_entregable'];?></td>
                     <td><?=$listentregables['conteoentregable'];?></td>
                      <td><?php 
                      if($listentregables['conteoentregableaprobados']==1) {
                        echo " Aprobado";
                        } else {
                        echo " No Aprobado";    
                        }?></td>
                    </tr>
                    <?php } ?>
            </table>
            </td>
            <td>
            <?=$listactividades['avancereal']."%"?>
            </td>
            </tr>

    <?php } ?>
</table>
</td>
<td> <?php echo $listdatos['avancefase']."%";?></td>
</tr>
<?php } ?>
</table>



