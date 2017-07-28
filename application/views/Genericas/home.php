<h2>Bienvenid@ a Proyectando</h2>
La herramienta diseñada para volver las ideas en una verdadera iniciativa de proyecto de grado
<hr>

 <?php
 if(!empty($listanotificaciones)){
 	?>
 	<div class="panel panel-primary"> 
<div class="panel-heading"> 
<h3 class="panel-title">Notificaciones</h3>
 </div>
  <div class="panel-body">
<div class="list-group">
 	<?php

    foreach ($listanotificaciones->result() as $notificacion) {
        ?>
        <button type="button" class="list-group-item"><?=$notificacion->mensaje;?></button>
        <?php  
}
?>
</div>
 </div> 
   </div>
<?php
}
    ?>

    <?php
 if(!empty($listarevision)){
 	?>
 	<div class="panel panel-primary"> 
<div class="panel-heading"> 
<h3 class="panel-title">Revisiones Pendientes</h3>
 </div>
  <div class="panel-body">
<div class="list-group">
 	<?php

    foreach ($listarevision->result() as $revision) {
        ?>
       <a href="<?=base_url()?>revision/misPendientes/1" class="list-group-item">Tiene Revisiones pendientes del grupo <strong><?=$revision->nombregrupo;?></strong></a>
        <?php  
}
?>
</div>
 </div> 
   </div>
<?php
}
    ?>
    <?php
 if(!empty($devueltos)){
 	?>
 	<div class="panel panel-primary"> 
<div class="panel-heading"> 
<h3 class="panel-title">Notificaciones</h3>
 </div>
  <div class="panel-body">
<div class="list-group">
 	<?php

    foreach ($devueltos->result() as $notificacion) {
        ?>
         <a href="<?=base_url()?>ideas/historiales/<?=$notificacion->idea;?>/<?=$notificacion->entregable;?>" class="list-group-item">Fue Devuelta una Version Generada </a>
        <?php  
}
?>
</div>
 </div> 
   </div>
<?php
}
    ?>
  