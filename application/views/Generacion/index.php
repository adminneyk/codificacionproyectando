<?php
require_once 'Generacion/classes/CreateDocx.inc';
$docx = new CreateDocx();
$infor="";
$i=0;
foreach ($datos as $key => $listdatos) { 
    $i++;
    $infor .="<h2>".$i.'- '.$listdatos['nombrefase'].'</h2>';
    $j=0;
     foreach ($listdatos['actividades'] as $key => $listactividades) { 
     $j++;
         $infor .="<h3>".$i.'.'.$j.' -'.$listactividades['nombreactividad'].'</h3>';
                    $k=0;
                   foreach ($listactividades['entregables'] as $key => $listentregables) {
                       $k++;
                       $infor .="<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$i.'.'.$j.'.'.$k.' '.$listentregables['nombre_entregable'].'</h4>'.$listentregables['entregable'].'';
                    } 
                   
     } 
 } 
//$infor .=' </ul>';

$docx->embedHTML(utf8_decode($infor));
$docx->createDocx('DocumentoAnteProyecto');
header("Content-disposition: attachment; filename=DocumentoAnteProyecto.docx");
header("Content-type: MIME");
readfile("DocumentoAnteProyecto.docx");
