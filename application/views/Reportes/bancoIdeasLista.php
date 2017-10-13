<ol class="breadcrumb">
  <li><a href="<?=base_url()?>home">Home</a></li>
  <li> <a href="<?=base_url()?>reportes">Listado de Infomes e Indicadores</a></li>
  <li class="active">Banco de Ideas</li>
</ol>

<legend>Banco de Ideas</legend>

<?php
$this->load->view('Genericas/mensajes');
?>
<br>
<?php 
if($listabanco==FALSE){
    ?>
    <div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> No se Encuentran Ideas Registradas
    </div>
        <?php
} else {
?>
<script type="text/javascript">
    $("#exportar").click(function(){
        $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "SomeFile" //do not include extension
  }); 
});
</script>
    <button id="exportar" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span> Exportar a Excel</button><br><br>
<br>
<table  class="table table-striped" id="table2excel">
   
    <thead>
        <tr>

            <th>Nombre de la Idea</th>
            <th>Descripción de la Idea</th>
            <th>Onjetivo General</th>
            <th>Objetivo Especifico</th>

        </tr>
    </thead>
    <?php
    foreach ($listabanco->result() as $parametros) {
        ?>
        <tr>
            <td><?php echo $parametros->nombre_idea; ?></td>
            <td><?php echo $parametros->descripcion_idea; ?></td>
            <td><?php echo $parametros->objetivo_general; ?></td>
            <td><?php echo $parametros->objetivo_especifico; ?></td>
            <?php
    }
    ?>
</table>
    <?php 
}
    ?>