<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ideas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->model('ideas_model');
        
    }
	public function index()
	{
                $this->load->helper('url');
		$this->load->view('Ideas/menu');
                $this->load->view('footer');
	}
        public function registro()
	{
                $datos['listaestudiantes'] = $this->ideas_model->obtenerEstudiantes($this->session->userdata('id_usuario'));
                $this->load->helper('url');
		$this->load->view('Ideas/registro',$datos);
                $this->load->view('footer');
	}
}
