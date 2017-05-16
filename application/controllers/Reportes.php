<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model');
        
        $this->load->library('form_validation');
    }
     public function index()
	{
        $this->load->view('cabecera');
        $this->load->view('menus');
            $this->load->view('Reportes/index');
            $this->load->view('footer');
	}
    public function parametrizaciones(){
            $data['nombreinforme']="Parametrizaciones";
            $this->load->view('cabecera');
            $this->load->view('menus');
            $this->load->view('Reportes/filtrador',$data);
          //  $this->load->view('Reportes/filtrador');
          //  $this->load->view('footer'); 
    }
    public function consultar(){
           echo "hola";
           $this->load->view('Reportes/vistaparametrizaciones');
    }

}
