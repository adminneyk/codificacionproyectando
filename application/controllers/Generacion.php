<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generacion extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function generarArchivo() {
       
        $this->load->view('generacion/index');
       
    }

}
