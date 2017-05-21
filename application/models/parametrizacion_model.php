<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrizacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerParametrizacion($idparametro = 0,$usuario) {
        if ($idparametro > 0) {
            $query = $this->db->get_where('parametrizacion', array('id_parametrizacion' => $idparametro,
                                                                     'id_responsable'=>$usuario));
        } else {
             $query = $this->db->get_where('parametrizacion', array('id_responsable'=>$usuario));
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
            return $this->db->update('parametrizacion', $data);
        } else {
            return $this->db->insert('parametrizacion', $data);
        }
    }

    public function obtenerFases($idparametro = 0) {
        if ($idparametro > 0) {
            $query = $this->db->get_where('fases', array('id_fase' => $idparametro));
        } else {
            $query = $this->db->get('fases');
        }
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
public function obtenerActividades($idparametro = 0) {
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
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function guardarentregable($nomentregable,
                        $descrientregable,
                        $publicacion,
                        $actividad,
                        $parametrizacion,
                        $textoayuda,
                        $id) {
        $data = array(
            'id_actividad' => $actividad,
            'id_parametrizacion' => $parametrizacion,
            'nombre_entregable' => $nomentregable,
            'descripcion_entregable' => $descrientregable,
            'texto_ayuda ' => $textoayuda,
            'estado ' => $publicacion
        );
        if ($id > 0) {
            $this->db->where('id_entregable', $id);
            return $this->db->update('entregable', $data);
        } else {
            return $this->db->insert('entregable', $data);
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
    
    public function validarfaltantes($idparametrizacion) {

        $this->db->select('actividad.nombre_actividad, (select count(*) '
                . 'from entregable '
                . 'where entregable.id_actividad=actividad.id_actividad and '
                . 'entregable.id_parametrizacion='.$idparametrizacion.' and entregable.estado=1) '
                . 'as conteo');
        $this->db->from('actividad');
        $this->db->where('estado' ,  1);
        $query=$this->db->get();

       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }


}

?>