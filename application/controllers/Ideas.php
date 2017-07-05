<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ideas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->model('ideas_model');
        $this->load->model('parametrizacion_model');
        
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
                 $datos['listaIdeas'] = $this->ideas_model->mostrarIntegrantes($this->session->userdata('id_usuario'));
                $this->load->view('Ideas/listaIdeas',$datos);
                $this->load->view('footer');
        }
        public function mostrarMarco()
        {    
            $codIdea = $this->uri->segment(3, 0);
            $parame=$this->ideas_model->obtenerParametrizacion($codIdea);
            //echo $parame;

            $fases=$this->parametrizacion_model->obtenerFases();
            $arrayfase=array();
            foreach ($fases->result() as $listfases) {
                $actividades=$this->parametrizacion_model->obtenerActividades($listfases->id_fase);
                if($actividades!=false){ 
                $arrayactividades=array();
                foreach ($actividades->result() as $listactividades) {
                    $entregablesporact=$this->parametrizacion_model->obtenerConteoActividades($parame,
                                                                     $listactividades->id_actividad);
                    $conteo = 0;
                    foreach ($entregablesporact->result() as $listaconteo) {
                        $conteo = $listaconteo->conteo;
                    }
                    $arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'cantidadact' => $conteo);
                        array_push($arrayactividades, $arrayact); 
                }
                  $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  $arrayactividades);
                array_push($arrayfase, $array); 
             }
            }
            $infor['datos']=$arrayfase;
            $infor['id']=$parame;
            $this->load->view('Ideas/administracionfases',$infor);
            $this->load->view('footer');
  }
        
        
}
