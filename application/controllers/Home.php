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
                $usuario =$this->session->userdata('id_usuario');
                $datos['listanotificaciones'] = $this->notificaciones_model->obtenerNotificaciones($usuario);
                $datos['listarevision'] = $this->notificaciones_model->obtenerRecordatorioRevision($usuario,1);
                $datos['devueltos'] = $this->notificaciones_model->obtenerRecordatorioRevision($usuario);
		        $this->load->view('Genericas/home',$datos);
                $this->load->view('footer');
	}
}
