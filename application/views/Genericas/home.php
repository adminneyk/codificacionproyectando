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
  