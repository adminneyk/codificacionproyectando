
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
		var mydata = [];
                <?php 
                foreach ($listabanco->result() as $parametros) {
                    ?>
                mydata.push(<?=json_encode($parametros)?>);        
                        <?php
            }
    ?>
    
    
    $(document).ready(function(){
		$("#list").jqGrid({
			datatype: "local",
                        width: "auto",
			height: "auto",
                        
			colNames:['#','Linea','Nombre de Idea', 'Descripcion','Objetivo General','Objetivo Especifico'],
			colModel:[
				{name:'id_idea',index:'id_idea',width:20},
				{name:'nombre_linea',index:'nombre_linea'},
				{name:'nombre_idea',index:'nombre_idea'},
				{name:'descripcion_idea',index:'descripcion_idea'},
				{name:'objetivo_general',index:'objetivo_general'},
				{name:'objetivo_especifico',index:'objetivo_especifico'}
				],
			altRows: true,
			pager:'#pager',
			rowNum: 5,
			rowList:[3,10,15,20]

		});
			for(var i=0;i<=mydata.length;i++)
				jQuery("#list").jqGrid('addRowData',i+1,mydata[i]);
			jQuery("#list").trigger("reloadGrid")
		});
		</script>
        
                <table id='list' style="min-width: 100%"></table>
<div id='pager'></div>

<?php 
}
    ?>