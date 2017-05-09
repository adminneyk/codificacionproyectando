<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrizacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerParametrizacion($idparametro = 0) {
        if ($idparametro > 0) {
            $query = $this->db->get_where('parametrizaciones', array('id_parametrizacion' => $idparametro));
        } else {
            $query = $this->db->get('parametrizaciones');
        }
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function guardar($nombrepara,$descritarea,$estado,$respo,  $id = 0) {
        $data = array(
            'nom_parametrizacion' => $nombrepara,
            'descripcion_parametrizacion' => $descritarea,
            'estado' => $estado,
            'id_responsable' => $respo
        );
        if ($id > 0) {
            $this->db->where('id_parametrizacion', $id);
            return $this->db->update('parametrizaciones', $data);
        } else {
            return $this->db->insert('parametrizaciones', $data);
        }
    }

}

?>