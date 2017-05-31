<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->model('banco_model');
        
    }
	public function index()
	{
  $datos['listagrupos'] = $this->banco_model->obtenerGrupos($this->session->userdata('id_usuario'));
  $this->load->helper('url');
	$this->load->view('Banco/menu',$datos);
  $this->load->view('footer');
	}
 public function bancoIdeas()
	{
    $this->load->helper('url');
    $grupo = $this->uri->segment(3, 0);
    $datos['ideasgrupo'] = $this->banco_model->obtenerIdeasPendientes($grupo);      
		$this->load->view('Banco/bancoIdeas',$datos);
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
