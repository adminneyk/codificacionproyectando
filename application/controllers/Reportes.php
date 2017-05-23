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
                $ideaslist .= '<option value"' . $id . '">' . $nombre . '</option>';
            }
        }

        echo $ideaslist;
    }

    public function consultarEstadoProyecto() {

        $idea = $this->input->post('idea');
        $parametrizaciones = $this->input->post('parametrizaciones');
        $fases = $this->reportes_model->obtenerFases();
        $arrayfase = array();
        foreach ($fases->result() as $listfases) {
            $actividades = $this->reportes_model->obtenerActividades($listfases->id_fase);
            if ($actividades != false) {
                $arrayactividades = array();
                foreach ($actividades->result() as $listactividades) {
                    
                }
            }
            echo "-" . $listfases->nombre_fase . "<hr><br>";
        }


        $data['data'] = $arrayfase;

        $this->load->view('Reportes/vistaavances', $data);
    }

}
