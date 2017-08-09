<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notificaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function notificar($idusuario, $mensaje) {



        $data = array(
            'mensaje' => $mensaje,
            'id_usuario' => $idusuario,
            'estado' => 1,
        );
        $this->db->insert('notificaciones', $data);
    }

    public function obtenerNotificaciones($idUsuario) {
        $query = $this->db->get_where('notificaciones', array('id_usuario' => $idUsuario));
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function obtenerRecordatorioRevision($idUsuario, $tipo = 0) {
        if ($tipo == 0) {
            $this->db->select('*');
            $this->db->from('recordatorios');
            $this->db->where(array('usuario' => $idUsuario, 'estado' => 4));
            // $query = $this->db->get_where('recordatorios', array('usuario'=>$idUsuario,'estado'=>4));
        } else {
            $this->db->select('*');
            $this->db->from('recordatorios');
            $this->db->where(array('responsable' => $idUsuario, 'estado' => 2));
            $this->db->group_by('nombreidea');

            // $query = $this->db->get_where('recordatorios', array('responsable'=>$idUsuario,'estado'=>2));
        }
        $query = $this->db->get();
//        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function obtenerPendientesBanco($idUsuario) {
            $this->db->select('*');
            $this->db->from('pendientesactuales');
            $this->db->where(array('id_responsable' => $idUsuario));
            // $query = $this->db->get_where('recordatorios', array('responsable'=>$idUsuario,'estado'=>2));
        
        $query = $this->db->get();
  //      echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>