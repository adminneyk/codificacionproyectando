<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
        function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuario_model');
    }
	
	public function index()
	{
            if($this->session->userdata('id_usuario')!=""){
                redirect(base_url().'home');
            }
                $this->load->helper('url');
                $this->load->helper('form');
		$this->load->view('Usuarios/formulario');
	}
        public function validar()
	{ 
              $usuario = $this->input->post('usuario');
              $clave = $this->input->post('clave');    
              $this->load->helper('form');
              $this->load->library('form_validation');
              $this->form_validation->set_rules('usuario', 'Usuario', 'required|min_length[3]');
              $this->form_validation->set_rules('clave', 'Clave', 'required|min_length[3]');
              $this->form_validation->set_message('required', 'El campo %s es obligatorio');
              if($this->form_validation->run() === true){
                  $res = $this->usuario_model->login($usuario,$clave);
                  if($res ==1){
                      redirect(base_url().'home');
                  }else{
                      redirect(base_url().'login');
                  }
              }else{
                $this->load->view("Usuarios/formulario");  
              }
                
	}
        
        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url().'login');
            
        } 
}
