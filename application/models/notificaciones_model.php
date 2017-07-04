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
        $query = $this->db->get_where('notificaciones', array('id_usuario'=>$idUsuario));
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
    

?>