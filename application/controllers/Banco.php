<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->model('banco_model');
        $this->load->model('notificaciones_model');
    }

    public function index() {
        $datos['listagrupos'] = $this->banco_model->obtenerGrupos($this->session->userdata('id_usuario'));
        $this->load->helper('url');
        $this->load->view('Banco/menu', $datos);
        $this->load->view('footer');
    }
    

    public function bancoIdeas() {
        $this->load->helper('url');
        $grupo = $this->uri->segment(3, 0);
        $datos['ideasgrupo'] = $this->banco_model->obtenerIdeasPendientes($grupo);
        $this->load->view('Banco/bancoIdeas', $datos);
        $this->load->view('footer');
    }

    public function validar() {
        //print_r($_POST);
        $nombreidea = $this->input->post('nombreidea');
        $descripidea = $this->input->post('descripidea');
        $integrantes = $this->input->post('integrantes');
        $this->ideas_model->guardar($nombreidea, $descripidea, $integrantes, $this->session->userdata('id_usuario'));
        $this->session->set_flashdata('correcto', 'Idea Guardada Correctamente!');
        redirect(base_url() . 'ideas', 'refresh');
    }

    public function desarrollarIdea() {
        $this->load->helper('url');
        $this->load->view('Ideas/listaIdeas');
        $this->load->view('footer');
    }

    public function aprobar() {
        $grupo = $this->uri->segment(3, 0);
        $idea = $this->uri->segment(4, 0);
        $estado = $this->uri->segment(5, 0);
        $this->banco_model->aprobarIdea($idea,$estado);
        $integrantes = $this->banco_model->mostrarIntegrantes($idea);
        foreach ($integrantes->result() as $integrante) {
           $usuario = $integrante->id_usuario;
           $nombreidea = $integrante->nombre_idea;
           if($estado==3){
            $mensaje="Su Idea ".$nombreidea." Es viable para continuar!";
           }
           if($estado==2){
            $mensaje="Su Idea ".$nombreidea." No es viable para continuar!";
           }
         }
      
        $this->session->set_flashdata('correcto', 'Idea Clasificada Correctamente!');
        redirect(base_url().'banco/bancoIdeas/'.$grupo,'refresh'); 
    }
    

}
