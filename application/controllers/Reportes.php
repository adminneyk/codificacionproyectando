<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model');
        $this->load->view('cabecera');
        $this->load->view('menus');
        $this->load->library('form_validation');
    }
     public function index()
	{
           
            $this->load->view('Reportes/index');
            $this->load->view('footer');
	}

}
