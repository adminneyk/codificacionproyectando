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
            $datos['parametrizaciones'] = $this->parametrizacion_model->obtenerParametrizacion(0,$this->session->userdata('id_usuario'));
            $this->load->view('Parametrizacion/index',$datos);
            $this->load->view('footer');
	}
        public function formulario()
	{
            $id = $this->uri->segment(3, 0);
            
            if(isset($id) && $id>0){
                $data['parametrizaciones'] = $this->parametrizacion_model->obtenerParametrizacion($id,$this->session->userdata('id_usuario'));
                $data['validador']=$this->parametrizacion_model->validarfaltantes($id);
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
            $id = $this->uri->segment(3, 0);
            $fases=$this->parametrizacion_model->obtenerFases();
            $arrayfase=array();
            foreach ($fases->result() as $listfases) {
                $actividades=$this->parametrizacion_model->obtenerActividades($listfases->id_fase);
                $arrayactividades=array();
                foreach ($actividades->result() as $listactividades) {
                    $entregablesporact=$this->parametrizacion_model->obtenerConteoActividades($id,
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
            $infor['datos']=$arrayfase;
            $infor['id']=$id;
            $this->load->view('Parametrizacion/administracionfases',$infor);
            $this->load->view('footer');
	}
        
    public function adminentregables()
	{
            $idactividad = $this->uri->segment(3, 0);
            $idparametrizacion = $this->uri->segment(4, 0);
            $datos['entregables'] = $this->parametrizacion_model->obtenerEntregables($idactividad,$idparametrizacion);
            
                $datos['idparametrizacion'] = $idparametrizacion;
                $datos['idactividad'] = $idactividad;
            $this->load->view('Parametrizacion/vistaentregables',$datos);
            $this->load->view('footer');
	}
    public function formentregables()
    {
            $idactividad = $this->uri->segment(3, 0);
            $idparametrizacion = $this->uri->segment(4, 0);
            $identregable = $this->uri->segment(5, 0);
            if ($identregable){
                $datos['entregables'] = $this->parametrizacion_model->obtenerEntregables(
                    $idactividad,
                    $idparametrizacion,
                    $identregable
                );
                $datos['tipo'] = "A";     
            } else {
                $datos['tipo'] = "C";
            }
            $datos['idparametrizacion'] = $idparametrizacion;
            $datos['idactividad'] = $idactividad;
            $this->load->view('Parametrizacion/formularioentregables',$datos);
            $this->load->view('footer');
    }
    
    public function validarentregable()
	{

        $nomentregable = $this->input->post('nomentregable');
        $descrientregable = $this->input->post('descrientregable');
        $publicacion = $this->input->post('publicacion');
        $actividad = $this->input->post('actividad');   
        $parametrizacion = $this->input->post('parametrizacion');
        $textoayuda = $this->input->post('textoayuda');
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nomentregable', 'Nombre Parametrizacion', 'required|min_length[3]');
        $this->form_validation->set_rules('descrientregable', 'Descripcion', 'required|min_length[3]');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        if($this->form_validation->run() === true){
                $this->parametrizacion_model->guardarentregable(
                        $nomentregable,
                        $descrientregable,
                        $publicacion,
                        $actividad,
                        $parametrizacion,
                        $textoayuda,
                        $id
                );
                redirect(base_url().'parametrizacion/adminentregables/'.$actividad.'/'.$parametrizacion);  
              }else{
                $this->load->view("parametrizacion/formulario");  
        }
        
        }
        
}
