<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrizacion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('parametrizacion_model');
        $this->load->view('cabecera');
        $this->load->view('menus');
    }
    	public function index()
	{
            $datos['parametrizaciones'] = $this->parametrizacion_model->obtenerParametrizacion();
            $this->load->view('Parametrizacion/index',$datos);
            $this->load->view('footer');
	}
        public function formulario()
	{
            $this->load->view('Parametrizacion/formulario');
            $this->load->view('footer');
	}
        public function administracion()
	{
            $this->load->view('Parametrizacion/administracion');
            $this->load->view('footer');
	}
        
        public function formadministracion()
	{
            $this->load->view('Parametrizacion/formadministracion');
            $this->load->view('footer');
	}
        
}
