<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrizacion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('parametrizacion_model');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->library('form_validation');
    }
    	public function index()
	{
            $datos['parametrizaciones'] = $this->parametrizacion_model->obtenerParametrizacion();
            $this->load->view('Parametrizacion/index',$datos);
            $this->load->view('footer');
	}
        public function formulario()
	{
            $id = $this->uri->segment(3, 0);
            
            if(isset($id) && $id>0){
                $data['parametrizaciones'] = $this->parametrizacion_model->obtenerParametrizacion($id);
            } else {
                $data['noid']="";
            }
            
            $this->load->view('Parametrizacion/formulario',$data);
            $this->load->view('footer');
	}
        public function validar()
	{
            $nombrepara = $this->input->post('nombrepara');
            $descritarea = $this->input->post('descritarea');
            $id = $this->input->post('id');
            $estado = $this->input->post('publicacion');
            $this->form_validation->set_rules('nombrepara', 'Nombre Parametrizacion', 'required|min_length[3]');
            $this->form_validation->set_rules('descritarea', 'Descripcion', 'required|min_length[3]');
            $this->form_validation->set_message('required', 'El campo %s es obligatorio');
            if($this->form_validation->run() === true){
                $this->parametrizacion_model->guardar($nombrepara,$descritarea,$estado,$this->session->userdata('id_usuario'),$id);
                redirect(base_url().'parametrizacion');  
              }else{
                $this->load->view("parametrizacion/formulario");  
              }
        }
        public function formulariofases()
	{
            $this->load->view('Parametrizacion/administracionfases');
            $this->load->view('footer');
	}
        
        public function formadministracion()
	{
            $this->load->view('Parametrizacion/formadministracion');
            $this->load->view('footer');
	}
        
}
