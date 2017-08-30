<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerdata($perfil = 0) {
        $db_prueba = $this->load->database('proyectandooracle', TRUE);
        $usuarios = $db_prueba->get('tablaprueba');
		foreach($usuarios->result() as $fila)
		{
			$data[] = $fila;
		}
		return $data;
    }
     public function obtenerdata2($perfil = 0) {
           $usuarios = $this->db->get('perfiles');
		foreach($usuarios->result() as $fila)
		{
			$data[] = $fila;
		}
		return $data;
     }

}

?>