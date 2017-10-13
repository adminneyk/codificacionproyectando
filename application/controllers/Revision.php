<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revision extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('banco_model');
        $this->load->model('revision_model');
        
    }
	public function index()
	{
                $this->load->helper('url');
                $this->load->view('cabecera');
                $this->load->view('menus');
        
                $datos['listagrupos'] = $this->banco_model->obtenerGrupos($this->session->userdata('id_usuario'));
		$this->load->view('Revision/menu',$datos);
                $this->load->view('footer');
	}
        public function misPendientes()
	{
            //vistaconteopendientes
                $idgrupo = $this->uri->segment(3, 0);
                $this->load->helper('url');
                $this->load->view('cabecera');
                $this->load->view('menus');
        $datos['listaconteo'] = $this->revision_model->obtenerConteos($idgrupo);
		$this->load->view('Revision/listado',$datos);
                $this->load->view('footer');
	}
        public function verificar()
	{
            //vistaconteopendientes
                $idgrupo = $this->uri->segment(3, 0);
                $ididea = $this->uri->segment(4, 0);
                $this->load->helper('url');
                $this->load->view('cabecera');
                $this->load->view('menus');
        //resumenpendientes
                $datos['listaconteo'] = $this->revision_model->mostrarPendientes($ididea);
		$this->load->view('Revision/faltantes',$datos);
                $this->load->view('footer');
	}
        public function generarRevision()
	{
            //vistaconteopendientes
                $idgrupo = $this->uri->segment(3, 0);
                $ididea = $this->uri->segment(4, 0);
                $version = $this->uri->segment(5, 0);
                $this->load->helper('url');
                $this->load->view('cabecera');
                $this->load->view('menus');
                
        //resumenpendientes
                $datos['idea'] = $ididea;
                $datos['version'] = $version;
                $datos['registros'] = $this->revision_model->mostrarPendiente($version);
		$this->load->view('Revision/formulario',$datos);
                $this->load->view('footer');
	}
        public function revisaEntregable()
	{
            $revision = $this->input->post('revision');
            $estado = $this->input->post('publicacion');
            $id = $this->input->post('id');
            $grupo = $this->input->post('grupo');
            $idea = $this->input->post('idea');
             $this->revision_model->actualizaversion($revision,$estado,$id);
            $avance = $this->revision_model->verificarAvanceReal($idea);
            if ($avance==100){
                $this->revision_model->updateIdea($idea);
                $msg = "Idea Madurada Correctamente";
            }
             
                $this->session->set_flashdata('correcto', 'Entregable Revisado Correctamente '.$msg.'!'); 
                redirect(base_url().'revision/verificar/'.$grupo.'/'.$idea);           
	}
        public function verHistorial()
	{
            $version = $this->uri->segment(3, 0);
            $idea = $this->uri->segment(4, 0);
            $data['info'] = $this->revision_model->verificarVersiones($version,$idea); 
            $this->load->view('Revision/historico',$data);
	}
        
        
        
        
        
}
