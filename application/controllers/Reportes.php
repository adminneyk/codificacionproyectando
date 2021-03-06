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
        $data['para'] = $this->reportes_model->obtenerParametrizaciones();
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/filtrador', $data);
        //  $this->load->view('Reportes/filtrador');
        //  $this->load->view('footer'); 
    }

    public function consultar() {

        $id = $this->input->post('id');

        $data['consulta'] = $this->reportes_model->obtenerParametrizacionesinforme($id);
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
    public function bancoIdeasLista() {
        $data['nombreinforme'] = "Estadistica por Marco de Trabajo";
        $datos =$this->reportes_model->obtenerIdeasBanco();
        $data['listabanco'] = $datos;
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->view('Reportes/bancoIdeasLista', $data);
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
        if ($dato != "") {
            foreach ($dato->result() as $notificacion) {
                $informacion .= "{name: '{$notificacion->nombre_idea}',data:[{$notificacion->faseuno},"
                        . "{$notificacion->fasedos},{$notificacion->fasetres},"
                        . "{$notificacion->fasecuatro},{$notificacion->fasecinco}]},";
            }
        }
        
        $info['informaciongeneral'] = $informacion;
        $this->load->view('Reportes/vistaavances', $info);
    }

    public function analizadorEntregable() {
        $parametrizacion = $this->input->post('parametrizaciones');
        $dato = $this->reportes_model->obtenerInformeGeneral($parametrizacion);
        
        $informacion = "{
            name: 'Porcentaje de Versiones',
            data: [";
        if ($dato != null) {
            foreach ($dato->result() as $info) {
                $label = $info->nombre_entregable;
                $dt = $info->conteoentregable;
                $informacion .= " {name: '{$label}',y: {$dt}},";
            }
        }
        $informacion .= "]}";
        $infor['informar']=$informacion;
        $this->load->view('Reportes/vistaEntregable', $infor);
    }

}
