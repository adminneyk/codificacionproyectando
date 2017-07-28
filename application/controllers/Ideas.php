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
        $this->load->model('reportes_model');
        
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
            $fases = $this->reportes_model->obtenerFases();
        $cantfases=0;
        $totalavance=0;
        $arrayfase=array();
            foreach ($fases->result() as $listfases) {
                $cantfases++;
                $avancefase=0;
                $contactividades=0;
                $actividades=$this->reportes_model->obtenerActividades($listfases->id_fase);
                if($actividades!=false){ 
                $arrayactividades=array();
                foreach ($actividades->result() as $listactividades) {
                    $contactividades++;
                    $entregablesporact=$this->reportes_model->obtenerDatosEntregable($listactividades->id_actividad,
                    $codIdea,
                      $parame);
                        $conteoentregable=0;
                        $conteoaprobadas=0;
                    if($entregablesporact!=false) {
                        $arrayentregable=array();
                        foreach ($entregablesporact->result() as $listaentregable) {
                            $conteoentregable++;
                            if($listaentregable->conteoentregablesaprobados==1){
                              $conteoaprobadas ++;  
                            }
                            $arrayent = array('id_entregable' =>  $listaentregable->id_entregable,'nombre_entregable' =>  $listaentregable->nombre_entregable,
                                      'conteoentregable' =>  $listaentregable->conteoentregable,
                                      'conteoentregableaprobados' =>  $listaentregable->conteoentregablesaprobados);
                        array_push($arrayentregable, $arrayent); 
                        }

                        if($conteoentregable == 0) {
                            $avanceactividad=0;
                        } else {
                               $avanceactividad=($conteoaprobadas/$conteoentregable)*100;
                         }
                        $avancefase= $avancefase + $avanceactividad;
$arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'entregables'=>$arrayentregable,
                                      'avancereal'=>$avanceactividad);
                        array_push($arrayactividades, $arrayact); 
                    } else{
                        if($conteoentregable == 0) {
                            $avanceactividad=0;
                        } else {
                               $avanceactividad=($conteoaprobadas/$conteoentregable)*100;
                         }
                         $avancefase = $avancefase + $avanceactividad;
$arrayact = array('id_actividad' =>  $listactividades->id_actividad,
                                      'nombreactividad' =>  $listactividades->nombre_actividad,
                                      'entregables'=>array(),
                                      'avancereal'=>$avanceactividad);
                        array_push($arrayactividades, $arrayact); 

                    }
                    
                }
                 if($contactividades == 0 ){
$avancefases=0;
                } else {
                   $avancefases=$avancefase/$contactividades; 
                }
                  $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  $arrayactividades,
                    'avancefase'=>$avancefases);
                array_push($arrayfase, $array); 
             } else {
                if($contactividades == 0 ){
$avancefases=0;
                } else {
                   $avancefases=$avancefase/$contactividades; 
                }
                $totalavance=$totalavance+$avancefases;
                 $array = array('id_fase' =>  $listfases->id_fase,
                    'nombrefase' =>  $listfases->nombre_fase,
                    'actividades' =>  array(),
                    'avancefase'=>$avancefases);
                array_push($arrayfase, $array);
             }
             $totalavance=$totalavance+$avancefases;
            }
        $data['datos'] = $arrayfase;
        $data['total'] = $totalavance/$cantfases;
        $this->load->view('Ideas/administracionfases',$data);
  }
  public function historiales(){
     $idea = $this->uri->segment(3, 0);
     $entregable = $this->uri->segment(4, 0);

     $datos['versiones'] = $this->ideas_model->obtenerVersiones($idea,$entregable);
     $this->load->view('Ideas/historiales',$datos);

  }

    public function gestionVersion(){
     $idea = $this->uri->segment(3, 0);
     $entregable = $this->uri->segment(4, 0);
     $version = $this->uri->segment(5, 0);
     if($version){
       $datos['versiones'] = $this->ideas_model->obtenerVersiones($idea,$entregable,$version);
     }
     $datos['ayuda'] = $this->ideas_model->obtenerAyuda($entregable);
     $this->load->view('Ideas/formVersion',$datos);

  }

  public function guardarVersion(){

          $texto = $this->input->post('ckeditor');
          $id = $this->input->post('id');
          $vers = $this->input->post('vers');
          if($id==""){
            $id=0;
          }
          $idea = $this->input->post('idea');
          $entregable = $this->input->post('entregable');
          if($vers!=1){
              $this->ideas_model->guardarVersion($id,$idea,$entregable,$texto);
          }else {
              $this->ideas_model->generarNuevaVersion($id,$idea,$entregable,$texto);
          }
               $this->session->set_flashdata('correcto', 'Version Guardada Correctamente!');
                redirect(base_url().'ideas/historiales/'.$idea.'/'.$entregable,'refresh');
    
  }

  public function solicitarRevision(){
          $idea = $this->uri->segment(3, 0);
          $entregable = $this->uri->segment(4, 0);
          $version = $this->uri->segment(5, 0);
          
           $this->ideas_model->solicitarRevision($idea,$entregable,$version);
           $this->session->set_flashdata('correcto', 'Version Enviada Correctamente!');
           redirect(base_url().'ideas/historiales/'.$idea.'/'.$entregable,'refresh');
    
  }

  

  






        
        
}
