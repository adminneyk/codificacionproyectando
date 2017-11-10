<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->model('notificaciones_model');
        
    }
	public function index()
	{
                $this->load->helper('url');
                $usuario = $this->session->userdata('id_usuario');
                $perfil = $this->session->userdata('perfil');
                //echo $perfil;
                if($perfil==2) {
                    $dato = array();
                    $grupos = array();
                    $dato = $this->notificaciones_model->obtenerGrupos($usuario);
                    foreach ($dato->result() as $listactividades) {
                        //$grupos.=$listactividades->GRU_CODIGO.",";
                        array_push($grupos, $listactividades->GRU_CODIGO);
                    }
                    $datos['listarevision'] = $this->notificaciones_model->obtenerRecordatorioRevision($grupos);
                    $datos['pendientesrevision'] = $this->notificaciones_model->obtenerPendientesBanco($grupos);
                    
                }
                if($perfil==3) {
                $datos['devueltos'] = $this->notificaciones_model->obtenerDevoluciones($usuario);
                $datos['paratrabajar'] = $this->notificaciones_model->pendientesarrancar($usuario);
                    
                }
                $this->load->view('Genericas/home',$datos);
                $this->load->view('footer');
	}
}
