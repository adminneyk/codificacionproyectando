<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerPerfiles($perfil = 0) {
        if ($perfil > 0) {
            $query = $this->db->get_where('perfiles', array('id_perfil' => $perfil,'visible' => 1));
        } else {
            $query = $this->db->get_where('perfiles', array('visible' => 1));
        }
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function guardar($nombre, $permisos, $id = 0) {
        $lpermisos = "";
        for ($y = 0; $y < count($permisos); $y++) {
            $lpermisos .= $permisos[$y] . ",";
        }
        $lpermisos = substr($lpermisos, 0, -1);
        $data = array(
            'nombre_perfil' => $nombre,
            'permisos' => $lpermisos
        );
        if ($id > 0) {
            $this->db->where('id_perfil', $id);
            return $this->db->update('perfiles', $data);
        } else {
            return $this->db->insert('perfiles', $data);
        }
    }

}

?>