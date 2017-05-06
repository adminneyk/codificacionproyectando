<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('cabecera');
        $this->load->view('menus');
        
    }
	public function index()
	{
                $this->load->helper('url');
		$this->load->view('Genericas/home');
                $this->load->view('footer');
	}
}
