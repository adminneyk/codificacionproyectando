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
    public function obtenerIdeasBanco() {
           $this->db->order_by("1", "asc");
       
            $query = $this->db->get('ideas_banco');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function obtenerParametros($nombreusuario = "") {
           $this->db->order_by("2", "asc");
           $query = $this->db->get_where('parametrizacion', array('estado'=>1));
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function obtenerInforme($grupo) {
        $this->db->select('*');
        $this->db->from('conteoporfases');
        $this->db->where('id_grupo', $grupo );
        $query=$this->db->get();

        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function obtenerIdeas($idparametrizacion = "") {
           $this->db->order_by("1", "asc");
        if ($idparametrizacion == "") {
            $query = $this->db->get('config');
        } else {
             $query = $this->db->get_where('config', array('id_parametrizacion'=>$idparametrizacion));
        }
        
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerFases() {
      
$query = $this->db->order_by('orden', 'ASC')->get_where('fases', array('estado'=>1));      
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

    public function obtenerDatosEntregable($actividad,$idea,$parame){
       
            $query = $this->db->get_where('resumengeneral ', array('id_actividad' => $actividad, 
                                                                    'id_idea' => $idea,
                                                                    'id_parametrizacion' => $parame));
       
      // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        } 

    }
    public function obtenerDatosEntregableVersion($actividad,$idea,$parame){
       
            $query = $this->db->get_where('mostraversiones ', array('id_actividad' => $actividad, 
                                                                    'id_idea' => $idea,
                                                                    'id_parametrizacion' => $parame));
       
      // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        } 

    }
    public function obtenerInformeGeneral($idparametrizacion){
       
            $query = $this->db->get_where('resumenentregablesgenerales ', array('id_parametrizacion' => $idparametrizacion));
       
       echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        } 

    }

     
    
    
    
    
}

?>