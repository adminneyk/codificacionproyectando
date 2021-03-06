<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class revision_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerConteos($idgrupo) {
        $this->db->select('*');
        $this->db->from('vistaconteopendientes');
        $this->db->where('conteo>0 and id_grupo = ' . $idgrupo);
        $query = $this->db->get();
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

    public function mostrarPendientes($ididea = 0) {

        $query = $this->db->get_where('resumenpendientes', array('id_idea' => $ididea, 'estado' => 2));
        // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function mostrarPendiente($idversion = 0) {

        $query = $this->db->get_where('versiones', array('id_version' => $idversion));
        // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function actualizaversion($revision, $estado, $id) {
        $data = array(
            'comentarios' => $revision,
            'estado' => $estado
        );
        $this->db->where('id_version', $id);
        return $this->db->update('versiones', $data);
    }

    public function verificarVersiones($idversion,$idea) {

        $this->db->select('id_entregable,id_idea');
        $this->db->where('id_version', $idversion);
        $id_entregable = $this->db->get('versiones')->row()->id_entregable;
        
        $this->db->select('*');
        $this->db->from('versiones');
        $this->db->where("id_idea", $idea);
        $this->db->where("id_entregable", $id_entregable);
        $this->db->where("estado", 5);
        $this->db->order_by("fecharegistro", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function verificarAvanceReal($idea) {

        $this->db->select('(aprobados*100)/total as conteo');
        $this->db->where('id_idea', $idea);
        return round($this->db->get('gestorcierre')->row()->conteo);
        
    }   
    public function updateIdea($id) {
        $data = array(
            'estado' => 4
        );
        $this->db->where('id_idea', $id);
        return $this->db->update('ideas', $data);
    }

}

?>