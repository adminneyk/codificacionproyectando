<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ideas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerEstudiantes($idEstudiante = 0) {
        $this->db->select('id_grupo');
        $this->db->where('id_usuario', $idEstudiante);
        $grupo=$this->db->get('cursos')->row()->id_grupo;
        //echo  $this->db->last_query();
        $query = $this->db->get_where('usuariosporgrupo', array('id_grupo' => $grupo));
        //echo  $this->db->last_query();
          if ($query->num_rows() > 0) {
          return $query;
          } else {
          return false;
          }
       
    }

}

?>