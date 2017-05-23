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
        $data['nombreinforme'] = "Progreso de Ideas";
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
                $id = $listaideas->id_idea;
                $nombre = $listaideas->nombre_idea;
                $ideaslist .= '<option value="' . $id . '">' . $nombre . '</option>';
            }
        }

        echo $ideaslist;
    }

    public function consultarEstadoProyecto() {

        $idea = $this->input->post('idea');
        $idparametrizaciones = $this->input->post('parametrizaciones');
        $fases = $this->reportes_model->obtenerFases();
        $arrayfase=array();
            foreach ($fases->result() as $listfases) {
                $actividades=$this->reportes_model->obtenerActividades($listfases->id_fase);
                if($actividades!=false){ 
                $arrayactividades=array();
                foreach ($actividades->result() as $listactividades) {
                    $entregablesporact=$this->reportes_model->obtenerDatosEntregable($listactividades->id_actividad,
                    $idea,
                      $idparametrizaciones);
                    if($entregablesporact!=false) {
                        $arrayentregable=array();
                        foreach ($entregablesporact->result() as $listaentregable) {
                            $arrayent = array('nombre_entregable' =>  $listaentregable->nombre_entregable,
                                      'conteoentregable' =>  $listaentregable->conteoentregable);
                        array_push($arrayentregable, $arrayent); 
                        }

                    }
                    $arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'entregables'=>$arrayentregable);
                        array_push($arrayactividades, $arrayact); 
                }
                  $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  $arrayactividades);
                array_push($arrayfase, $array); 
             } else {
                 $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  array());
                array_push($arrayfase, $array);
             }
            }
var_dump($arrayfase);


        /*
        $fases = $this->reportes_model->obtenerFases();
        $fasedata=array();
        foreach ($fases->result() as $listfases) {
            $actividades = $this->reportes_model->obtenerActividades($listfases->id_fase);
             $actividaddata=array();
            if ($actividades != false) {

                foreach ($actividades->result() as $listactividades) {

                     $entregable = $this->reportes_model->obtenerDatosEntregable($listactividades->id_actividad,
                    $idea,
                      $idparametrizaciones);
                     $entregabledata=array();
                       if ($entregable != false) {
                        
                             foreach ($entregable->result() as $listarentregable) {
                                array_push($entregabledata,'Entregable 001' );
                             }
                           
                        } else {
                                array_push($entregabledata,'No' );
                        }
                }
                 array_push($actividaddata, $entregabledata);
            } else {
               
                array_push($actividaddata, 0);
            }
            $actividad=
             array_push($fasedata,""$actividaddata);
        }
       var_export($fasedata);
        $data['data'] = $arrayfase;
*/
        $data['datos'] = $arrayfase;
        $this->load->view('Reportes/vistaavances',$data);
    }

}
