<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model');

        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/index');
        $this->load->view('footer');
    }
    public function Indicadores() {
        $this->load->view('cabecera');
        $this->load->view('menus');
        $data['inforfases'] = '2, 2, 2, 2, 2, 2';
        $this->load->view('Reportes/indicadores',$data);
        $this->load->view('footer');
    }

    public function parametrizaciones() {
        $data['nombreinforme'] = "Parametrizaciones";
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/filtrador', $data);
        //  $this->load->view('Reportes/filtrador');
        //  $this->load->view('footer'); 
    }

    public function consultar() {

        $responsable = $this->input->post('responsable');

        $data['consulta'] = $this->reportes_model->obtenerParametrizaciones($responsable);
        $data['responsable'] = $responsable;
        $this->load->view('Reportes/vistaparametrizaciones', $data);
    }

    public function progresoReal() {
        $data['nombreinforme'] = "Indicador Entregables de Fases por Idea";
        $data['parametrizaciones'] = $this->reportes_model->obtenerParametros();
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/filtroideas', $data);
        //  $this->load->view('Reportes/filtrador');
        //  $this->load->view('footer'); 
    }
    public function progresoEntregables() {
        $data['nombreinforme'] = "Estadistica por Parametrizacion";
        $data['parametrizaciones'] = $this->reportes_model->obtenerParametros();
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/filtroideas', $data);
        //  $this->load->view('Reportes/filtrador');
        //  $this->load->view('footer'); 
    }

    public function consultarIdeas() {

        $parametrizacion = $this->input->post('parametrizacion');

        $param = $this->reportes_model->obtenerIdeas($parametrizacion);
        $ideaslist = "";
        if ($param) {
            foreach ($param->result() as $listaideas) {
                $id = $listaideas->GRU_CODIGO;
                $nombre = $listaideas->GRU_CODIGO;
                $ideaslist .= '<option value="' . $id . '">' . $nombre . '</option>';
            }
        }

        echo $ideaslist;
    }

    public function consultarEstadoProyecto() {
        
    $data = array();
    
    $grupo = $this->input->post('idea');
    $parametrizacion = $this->input->post('parametrizaciones');
    $dato = $this->reportes_model->obtenerInforme($grupo);
    $informacion= "";
    foreach ($dato->result() as $notificacion) {
        $informacion .="{$notificacion->nombre_idea}|{$notificacion->faseuno},"
        . "{$notificacion->fasedos},{$notificacion->fasetres},"
        . "{$notificacion->fasecuatro},{$notificacion->fasecinco}_";
                    
     }
     $info['informaciongeneral'] = $informacion;
               
    //var_export($dato);
   // array_push($data,array("Fase 1","5,6,2,3,8"));
   // $info['datos']= $data;
        /*$idea = $this->input->post('idea');
        $idparametrizaciones = $this->input->post('parametrizaciones');
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
                    $idea,
                      $idparametrizaciones);
                        $conteoentregable=0;
                        $conteoaprobadas=0;
                    if($entregablesporact!=false) {
                        $arrayentregable=array();
                        foreach ($entregablesporact->result() as $listaentregable) {
                            $conteoentregable++;
                            if($listaentregable->conteoentregablesaprobados==1){
                              $conteoaprobadas ++;  
                            }
                            $arrayent = array('nombre_entregable' =>  $listaentregable->nombre_entregable,
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
        */$this->load->view('Reportes/vistaavances',$info);
    }

}
