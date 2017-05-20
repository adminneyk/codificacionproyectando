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
    public function obtenerFases() {
           $this->db->order_by("orden", "asc");
           $query = $this->db->get('fases'); 
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
            public function obtenerConteoActividades($idparametrizacion,$idactividad ) {

        $this->db->select('count(*) as conteo');
        $this->db->from('entregable');
        $this->db->where('id_actividad', $idactividad );
        $this->db->where('id_parametrizacion' ,  $idparametrizacion);
        $this->db->where('estado' ,  1);
        $query=$this->db->get();

       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerActividades($idparametro = 0) {
        $this->db->order_by("orden", "asc");
        if ($idparametro > 0) {
            $query = $this->db->get_where('actividad', array('id_fase' => $idparametro,
                                                             'estado' => 1));
        } else {
            $query = $this->db->get_where('actividad', array('estado' => 1));
        }
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerEntregables($idactividad,$id_parametrizacion ,$id_entregable = 0) {
        if ($id_entregable == 0) {
            $query = $this->db->get_where('entregable', array('id_actividad' => $idactividad, 
                                                                    'id_parametrizacion' => $id_parametrizacion));
        } else {
            $query = $this->db->get_where('entregable', array('id_actividad' => $idactividad, 
                                                                    'id_parametrizacion' => $id_parametrizacion,
                                                                    'id_entregable' => $id_entregable));
        }
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    
    
    
}

?>