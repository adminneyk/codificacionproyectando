<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerGrupos($idUsuario = 0) {
        $dbdatos = $this->load->database('proyectandooracle', TRUE);
        $this->db->select('MAT_CODIGO as materia');
        $materia = $this->db->get('config')->row()->materia;


        if ($idUsuario > 0) {
            // $query = $db_prueba->get_where('art_horario', array('MAT_CODIGO' => $materia,'CLI_NDCTO_PROF' => $idUsuario));
            $dbdatos->select('GRU_CODIGO as id_grupo,GRU_CODIGO as nombre_grupo');
            $dbdatos->where('MAT_CODIGO', $materia);
            $dbdatos->where('CLI_NDCTO_PROF', $idUsuario);
            $query = $dbdatos->get('art_horario');
        } else {
            $query = $db_prueba->get('art_horario');
        }
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function obtenerIdeasPendientes($idgrupo = 0) {
        if ($idgrupo > 0) {
            $query = $this->db->get_where('ideas', array('estado' => 1, 'id_grupo' => $idgrupo));
        } else {
            $query = $this->db->get_where('ideas', array('id_grupo' => $idgrupo));
        }
        // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function guardar($nombreidea, $descripidea, $integrantes, $idEstudiante) {

        $this->db->select('id_grupo');
        $this->db->where('id_usuario', $idEstudiante);
        $grupo = $this->db->get('cursos')->row()->id_grupo;
        $data = array(
            'id_grupo' => $grupo,
            'id_linea' => 1,
            'nombre_idea' => $nombreidea,
            'descripcion_idea' => $descripidea,
            'estado' => 1,
        );
        $this->db->insert('ideas', $data);
        $this->db->select('max(id_idea) as idea');
        $idea = $this->db->get('ideas')->row()->idea;

        foreach ($integrantes as $id) {
            $data = array(
                'id_idea' => $idea,
                'id_usuario' => $id,
                'estado' => 1,
            );
            $this->db->insert('equipos', $data);
        }
    }

    public function aprobarIdea($idea, $estado) {
        $data = array(
            'estado' => $estado
        );
        $this->db->where('id_idea', $idea);
        return $this->db->update('ideas', $data);
    }

    public function mostrarIntegrantes($ididea) {

        $this->db->select('*');
        $this->db->from('equipos');
        $this->db->join('ideas', 'equipos.id_idea=ideas.id_idea');
        $this->db->where('ideas.id_idea', $ididea);
        return $query = $this->db->get();
    }

    public function mostrarIntegrantesConteo($ididea, $grupo) {

        $this->db->select('DISTINCT(ideas.id_idea) as ididea');
        $this->db->from('ideas');
        $this->db->join('equipos', 'equipos.id_idea=ideas.id_idea');
        $this->db->where_in("equipos.id_usuario", $grupo);
        $this->db->where("ideas.id_idea!=", $ididea);

        return $query = $this->db->get();
    }

    public function mostrarListaIdeas() {

        $query = $this->db->get_where('ideas_banco', array('1' => 1));

        // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>