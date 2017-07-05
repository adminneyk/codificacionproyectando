<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>ideas">Opciones de Ideas</a></li>
  <li><a href="<?=base_url()?>ideas/desarrollarIdea">Desarrollar Ideas</a></li>
  <li class="active">Marco de Idea</li>
</ol>
<legend>Marco de Desarrollo de Idea</legend>
<table class="table table-bordered">
<thead>
    <tr>
        <th>Fases</th>
        <th>Resumen de Actividades</th>
    </tr>
</thead>
<?php 
$bandera = 0;
foreach ($datos as $key => $listdatos) { 
if($listdatos['avancefase'] !=100 && $bandera==0){
$editable = true;
$bandera = 1;
} else {
$editable = false;
}

?>
<tr>
<td>
Fase <?php echo $listdatos['nombrefase'];
if(!$editable){
echo " <br>(FASE BLOQUEDA)";
}
?>
</td>
<td>
 <table class="table table-bordered">
 <thead>
     <tr>
         <th>Nombre de Actividad</th>
         <th>Resumen de Entregables</th>
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
                      if($editable){


                      if($listentregables['conteoentregableaprobados']==1) {
                        echo '<span class="glyphicon glyphicon-thumbs-up"></span> Entregable Completado';   
                        } else {
                          $codIdea = $this->uri->segment(3, 0);
                         echo '<a href="'.base_url().'ideas/historiales/'.$codIdea.$listentregables['id_entregable'].'"><span class="glyphicon glyphicon-folder-open"></span> Gestionar Entregagle</a>';    
                        }
                        } else {
 echo '<span class="glyphicon glyphicon-stop"></span> Entregable Bloqueado';  
                        }?></td>
                    </tr>
                    <?php } ?>
            </table>
            </td>
            </tr>

    <?php } ?>
</table>
</td>
</tr>
<?php


 } ?>
</table>





