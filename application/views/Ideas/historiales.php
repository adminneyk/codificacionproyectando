<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li><a href="<?=base_url()?>ideas">Opciones de Ideas</a></li>
  <li><a href="<?=base_url()?>ideas/desarrollarIdea">Desarrollar Ideas</a></li>
  <li><a href="<?=base_url()?>ideas/mostrarMarco/<?=$this->uri->segment(3, 0)?>">Marco de Idea</a></li>
  <li class="active">Gestion de Versiones</li>
</ol>
<legend>Marco de Desarrollo de Idea</legend>
<br><br>
<?php
$this->load->view('Genericas/mensajes');
?><br>

<?php 

$validacrear = true;

if (empty($versiones)) {
	?>
<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>No se a Registrado Ninguna Version para el Entregable
</div>
	<?php
} else {
?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Fecha de Registro</th>
            <th>Estado Actual</th>
            <th colspan="2">Acciones</th>

        </tr>
    </thead>
<?php
    foreach ($versiones->result() as $versiones) {
    	if($validacrear){
    		if($versiones->estado==1 || $versiones->estado==2 || $versiones->estado==3 || $versiones->estado==4){
    			$validacrear=false;
    		}
    	}


     ?>
 <tr>
            <td><?php echo $versiones->fecharegistro; ?></td>
            <td><?php
            if($versiones->estado==1){
            	echo "Guardado";
            }
            if($versiones->estado==2){
            	echo "Enviado";
            }
            if($versiones->estado==3){
            	echo "Aprobado";
            }

            if($versiones->estado==4){
            	echo "Devuelto";
            }

            if($versiones->estado==5){
            	echo "Historico";
            }
             

             ?></td>
            <td> 
            <?php
              if($versiones->estado==2 || $versiones->estado==3 || $versiones->estado==5)
              {
                $mensaje='<span class="glyphicon glyphicon-zoom-in"></span> Ver Version';
                
              } else {
                $mensaje='<span class="glyphicon glyphicon-edit"></span> Editar Version';
              }
            ?>

            <a href="<?= base_url()?>ideas/gestionVersion/<?=$this->uri->segment(3, 0)?>/<?=$this->uri->segment(4, 0)?>/<?=$versiones->id_version?>"><?=$mensaje?></a>



            </td>
            <?php 
            if($versiones->estado==1){
              ?>
               <td> <a href="<?= base_url()?>ideas/solicitarRevision/<?=$this->uri->segment(3, 0)?>/<?=$this->uri->segment(4, 0)?>/<?=$versiones->id_version?>"><span class="glyphicon glyphicon-edit"></span> Enviar a Revision</a></td>
              <?php
            }
            ?>




        </tr>
     <?php
    }
    ?>
</table>
    <?php
	}
if($validacrear){
	?>
<a class="btn btn-warning" href="<?= base_url()?>ideas/gestionVersion/<?=$this->uri->segment(3, 0)?>/<?=$this->uri->segment(4, 0)?>">Crear Version</a>
	<?php
}




	?>

