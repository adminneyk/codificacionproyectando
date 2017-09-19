<?php
require_once 'Generacion/classes/CreateDocx.inc';
$docx = new CreateDocx();
$infor="";
$i=0;
foreach ($datos as $key => $listdatos) { 
    $i++;
    $infor .=$i.') '.$listdatos['nombrefase'].'</strong><br>';
    $j=0;
     foreach ($listdatos['actividades'] as $key => $listactividades) { 
     $j++;
         $infor .=$i.'.'.$j.') '.$listactividades['nombreactividad'].'</strong><br>';
                    $k++;
                   foreach ($listactividades['entregables'] as $key => $listentregables) {
                       $k++;
                       $infor .=$i.'.'.$j.''.$k.') '.$listentregables['nombre_entregable'].'<br>'.$listentregables['entregable'].'</strong>';
                    } 
                   
     } 
 } 
//$infor .=' </ul>';

$docx->embedHTML(utf8_decode($infor));
$docx->createDocx('DocumentoAnteProyecto');
header("Content-disposition: attachment; filename=DocumentoAnteProyecto.docx");
header("Content-type: MIME");
readfile("DocumentoAnteProyecto.docx");
