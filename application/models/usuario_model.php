<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($documento, $clave) {
        $this->db->select('usuario.id_usuario,usuario.id_perfil,perfiles.nombre_perfil,perfiles.permisos');
        $this->db->from('usuario');
        $this->db->join('perfiles', 'perfiles.id_perfil=usuario.id_perfil');
        $this->db->where('usuario.usuario', $documento);
        $this->db->where('usuario.clave', $clave);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $id = $data->id_usuario;
            $idpefil = $data->id_perfil;
            $nombreperil = $data->nombre_perfil;
            $permisos = $data->permisos;
            $mispermisos=array();
            $permisossesion = explode(",", $permisos);
            for ($y = 0; $y < count($permisossesion); $y++) {
                array_push($mispermisos, $permisossesion[$y]);
            }
             array_push($mispermisos, "home");
            $usuario_data = array("id_usuario" => $id,
                "nombre_perfil" => $nombreperil,
                "perfil" => $idpefil,
                "permisos" => $mispermisos);
            $this->session->set_userdata($usuario_data);
            return 1;
        } else {
            return 0;
        }
    }

}

?>