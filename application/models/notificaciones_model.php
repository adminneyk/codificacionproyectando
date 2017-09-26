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

    public function obtenerDevoluciones($idUsuario) {
        $query = $this->db->get_where('faltantes', array('id_usuario' => $idUsuario));
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
public function obtenerGrupos($idusuario) {

        $dbdatos = $this->load->database('proyectandooracle', TRUE);
        $dbdatos->select('GRU_CODIGO');
        $dbdatos->from('art_horario');
        $dbdatos->where('CLI_NDCTO_PROF',$idusuario);
       // echo  $dbdatos->last_query();
        return $query = $dbdatos->get();
    }
    public function obtenerRecordatorioRevision($grupos = array()) {
            
        
            $this->db->select('*');
            $this->db->from('recordatorios');
            $this->db->where_in("id_grupo",$grupos);
            $this->db->group_by('id_grupo');
            $query = $this->db->get();
           // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function obtenerPendientesBanco($grupos) {
     $this->db->select('*');
            $this->db->from('pendientesactuales');
            $this->db->where_in("grupo",$grupos);
            $this->db->group_by('grupo');
            $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>