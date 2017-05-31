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
        public function validar()
    {
           //print_r($_POST);
          $nombreidea = $this->input->post('nombreidea');
          $descripidea = $this->input->post('descripidea');
          $integrantes = $this->input->post('integrantes');
          $this->ideas_model->guardar($nombreidea,$descripidea,$integrantes,$this->session->userdata('id_usuario'));
               $this->session->set_flashdata('correcto', 'Idea Guardada Correctamente!');
                redirect(base_url().'ideas','refresh');  
        }
        public function desarrollarIdea()
        {
                $this->load->helper('url');
                $this->load->view('Ideas/listaIdeas');
                $this->load->view('footer');
        }
        
}
