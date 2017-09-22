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
        $this->load->view('Reportes/indicadores', $data);
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
        $data['nombreinforme'] = "Estadistica por Marco de Trabajo";
        $data['parametrizaciones'] = $this->reportes_model->obtenerParametros();
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/filtroentregable', $data);
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
        $informacion = "";
        foreach ($dato->result() as $notificacion) {
            $informacion .= "{$notificacion->nombre_idea}|{$notificacion->faseuno},"
                    . "{$notificacion->fasedos},{$notificacion->fasetres},"
                    . "{$notificacion->fasecuatro},{$notificacion->fasecinco}_";
        }
        $info['informaciongeneral'] = $informacion;
        $this->load->view('Reportes/vistaavances', $info);
    }
    
    public function analizadorEntregable() {
        $parametrizacion = $this->input->post('parametrizaciones');
        $dato = $this->reportes_model->obtenerInformeGeneral($parametrizacion);
        $datalabel = "";
        $datainfo = "";
        foreach ($dato->result() as $info) {
            $label = $info->nombre_entregable;
            $dt = $info->conteoentregable;
            $datalabel .= "{$label}|";
            $datainfo .= "{$dt}|";
        }
        $infor['labels']= $datalabel;
        $infor['infor']= $datainfo;
        
        $this->load->view('Reportes/vistaEntregable', $infor);
    }

}
