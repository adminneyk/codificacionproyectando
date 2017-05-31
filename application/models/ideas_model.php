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

    public function guardar($nombreidea,$descripidea,$integrantes,$idEstudiante) {

        $this->db->select('id_grupo');
        $this->db->where('id_usuario', $idEstudiante);
        $grupo=$this->db->get('cursos')->row()->id_grupo;
        $data = array(
            'id_grupo' => $grupo,
            'id_linea' => 1,
            'nombre_idea' => $nombreidea,
            'descripcion_idea' => $descripidea,
            'estado' => 1,
        );
         $this->db->insert('ideas', $data);
         $this->db->select('max(id_idea) as idea');
         $idea=$this->db->get('ideas')->row()->idea;
          
foreach ($integrantes as $id) {
        $data = array(
            'id_idea' => $idea,
            'id_usuario' => $id,
            'estado' => 1,
        );
         $this->db->insert('equipos', $data);
}
         
    }

}

?>