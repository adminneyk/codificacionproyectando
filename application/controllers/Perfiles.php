<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('perfil_model');
        $this->load->view('cabecera');
        $this->load->view('menus');
    }
    	public function index()
	{
            $datos['listaperfiles'] = $this->perfil_model->obtenerPerfiles();
            $this->load->view('Usuarios/perfiles',$datos);
            $this->load->view('footer');
	}
        public function formulario()
	{
            
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $datos['listaperfiles'] = $this->perfil_model->obtenerPerfiles($id);
            } else {
                $id = 0;
                $datos[]="";
            }
            
            $this->load->view('Usuarios/formperfiles',$datos);
            $this->load->view('footer');
	}
        public function validar()
	{
            $id = $this->input->post('id');
            $nomperfil = $this->input->post('perfil');
            $perfiles = $this->input->post('permisos');
            $this->perfil_model->guardar($nomperfil,$perfiles,$id);
            redirect(base_url().'perfiles');
        }
}
