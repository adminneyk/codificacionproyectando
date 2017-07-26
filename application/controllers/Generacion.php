<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ideas_model');
        $this->load->model('parametrizacion_model');
        $this->load->model('reportes_model');
    }

    public function generarArchivo() {
       $codIdea = $this->uri->segment(3, 0);
            $parame=$this->ideas_model->obtenerParametrizacion($codIdea);
            $fases = $this->reportes_model->obtenerFases();
        $cantfases=0;
        $totalavance=0;
        $arrayfase=array();
            foreach ($fases->result() as $listfases) {
                $cantfases++;
                $avancefase=0;
                $contactividades=0;
                $actividades=$this->reportes_model->obtenerActividades($listfases->id_fase);
                if($actividades!=false){ 
                $arrayactividades=array();
                foreach ($actividades->result() as $listactividades) {
                    $contactividades++;
                    $entregablesporact=$this->reportes_model->obtenerDatosEntregable($listactividades->id_actividad,
                    $codIdea,
                      $parame);
                        $conteoentregable=0;
                        $conteoaprobadas=0;
                    if($entregablesporact!=false) {
                        $arrayentregable=array();
                        foreach ($entregablesporact->result() as $listaentregable) {
                            $conteoentregable++;
                            if($listaentregable->conteoentregablesaprobados==1){
                              $conteoaprobadas ++;  
                            }
                            $arrayent = array('id_entregable' =>  $listaentregable->id_entregable,'nombre_entregable' =>  $listaentregable->nombre_entregable,
                                      'conteoentregable' =>  $listaentregable->conteoentregable,
                                      'conteoentregableaprobados' =>  $listaentregable->conteoentregablesaprobados);
                        array_push($arrayentregable, $arrayent); 
                        }

                        if($conteoentregable == 0) {
                            $avanceactividad=0;
                        } else {
                               $avanceactividad=($conteoaprobadas/$conteoentregable)*100;
                         }
                        $avancefase= $avancefase + $avanceactividad;
$arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'entregables'=>$arrayentregable,
                                      'avancereal'=>$avanceactividad);
                        array_push($arrayactividades, $arrayact); 
                    } else{
                        if($conteoentregable == 0) {
                            $avanceactividad=0;
                        } else {
                               $avanceactividad=($conteoaprobadas/$conteoentregable)*100;
                         }
                         $avancefase = $avancefase + $avanceactividad;
$arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'entregables'=>array(),
                                      'avancereal'=>$avanceactividad);
                        array_push($arrayactividades, $arrayact); 

                    }
                    
                }
                 if($contactividades == 0 ){
$avancefases=0;
                } else {
                   $avancefases=$avancefase/$contactividades; 
                }
                  $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  $arrayactividades,
                    'avancefase'=>$avancefases);
                array_push($arrayfase, $array); 
             } else {
                if($contactividades == 0 ){
$avancefases=0;
                } else {
                   $avancefases=$avancefase/$contactividades; 
                }
                $totalavance=$totalavance+$avancefases;
                 $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  array(),
                    'avancefase'=>$avancefases);
                array_push($arrayfase, $array);
             }
             $totalavance=$totalavance+$avancefases;
            }
        $data['datos'] = $arrayfase;
        $data['total'] = $totalavance/$cantfases;
        $this->load->view('generacion/index',$data);
       
    }

}
