<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerParametrizaciones($nombreusuario = "") {
           $this->db->order_by("1", "asc");
        if ($nombreusuario == "") {
            $query = $this->db->get('vista_parametrizacion');
        } else {
             $query = $this->db->get_where('vista_parametrizacion', array('usuario'=>$nombreusuario));
        }
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerParametros($nombreusuario = "") {
           $this->db->order_by("2", "asc");
           $query = $this->db->get('parametrizaciones');
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function obtenerIdeas($idparametrizacion = "") {
           $this->db->order_by("1", "asc");
        if ($idparametrizacion == "") {
            $query = $this->db->get('ideas');
        } else {
             $query = $this->db->get_where('ideas', array('id_idea'=>$idparametrizacion));
        }
        //echo  $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}

?>