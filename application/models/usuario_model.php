<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($documento, $clave) {
        $db_prueba = $this->load->database('proyectandooracle', TRUE);
        $db_prueba->select("(SELECT COUNT(*) FROM rct_clientes where rct_clientes.CLI_NUM_DCTO=logueos.CLI_NUMDCTO) AS profesor,"
                . "(SELECT COUNT(*) FROM art_estudiantes where art_estudiantes.CLI_NUMDCTO=logueos.CLI_NUMDCTO) AS estudiante,logueos.CLI_NUMDCTO,logueos.USUARIO");
        $db_prueba->from('logueos');
        $db_prueba->where('usuario', $documento);
        $db_prueba->where('clave', $clave);

        $this->db->select("*");
        $this->db->from('usuarios');
        $this->db->where('CLI_NUMDCTO', md5($documento));

        $querydata = $this->db->get();
        $admin = FALSE;
        if ($querydata->num_rows() > 0) {
            $admin = true;
        }
        $query = $db_prueba->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $id = $data->CLI_NUMDCTO;
            if ($data->profesor == 1) {
                if ($admin) {
                    $idpefil = 1;
                    $permisos = array('reportes', 'home', 'parametrizacion', 'paramcurso');
                    $nombreper="ADMINISTRADOR";
                } else {
                    $idpefil = 2;
                    $permisos = array('reportes', 'revision', 'banco', 'home','ideas');
                    $nombreper="PROFESOR";
                }
            }
            if ($data->estudiante == 1) {
                $idpefil = 3;
                $nombreper="ESTUDIANTE";
                $permisos = array('ideas', 'home');
            }
            $nombreusuario = $data->USUARIO;

            $usuario_data = array("id_usuario" => $id,
                "nombre_perfil" => $nombreper,
                "perfil" => $idpefil,
                "permisos" => $permisos,
                "nombre_usuario" => $nombreusuario);
            $this->session->set_userdata($usuario_data);
            return 1;
        } else {
            return 0;
        }
    }

    public function obtenerProfesores() {

        $query = $this->db->get_where('usuario', array('id_perfil' => 2));

        // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>