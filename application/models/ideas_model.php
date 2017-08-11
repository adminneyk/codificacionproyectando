<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ideas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerEstudiantes($idEstudiante = 0) {
        $this->db->select('id_grupo');
        $this->db->where('id_usuario', $idEstudiante);
        $grupo=$this->db->get('cursos')->row()->id_grupo;
        //echo  $this->db->last_query();
        $query = $this->db->get_where('usuariosporgrupo', array('id_grupo' => $grupo));
        //echo  $this->db->last_query();
          if ($query->num_rows() > 0) {
          return $query;
          } else {
          return false;
          }
       
    }

    public function guardar($nombreidea,$descripidea,$integrantes,$idEstudiante,$linea,$objetivogeneral,$objetivoespecifico) {

        $this->db->select('id_grupo');
        $this->db->where('id_usuario', $idEstudiante);
        $grupo=$this->db->get('cursos')->row()->id_grupo;
        $data = array(
            'id_grupo' => $grupo,
            'id_linea' => $linea,
            'nombre_idea' => $nombreidea,
            'descripcion_idea' => $descripidea,
            'objetivo_general' => $objetivogeneral,
            'objetivo_especifico' => $objetivoespecifico,
            'estado' => 1,
        );
         $this->db->insert('ideas', $data);
         $this->db->select('max(id_idea) as idea');
         $idea=$this->db->get('ideas')->row()->idea;
          
foreach ($integrantes as $id) {
        $data = array(
            'id_idea' => $idea,
            'id_usuario' => $id,
            'estado' => 1,
        );
         $this->db->insert('equipos', $data);
}
         
    }
    public function mostrarIntegrantes($ididea) {

        $this->db->select('*');
        $this->db->from('equipos');
        $this->db->join('ideas','equipos.id_idea=ideas.id_idea');
        $this->db->where('equipos.id_usuario',$ididea);
        $this->db->where('ideas.estado',3);
        return $query = $this->db->get();
    }

    public function obtenerParametrizacion($idIdea) {

        $this->db->select('grupo.id_parametrizacion','parametrizacion');
        $this->db->from('grupo');
        $this->db->join('ideas','grupo.id_grupo=ideas.id_grupo');
        $this->db->where('ideas.id_idea',$idIdea);
        //echo  $this->db->last_query();
        return $this->db->get()->row()->id_parametrizacion;
         
    }
    
     public function obtenerLineas() {
        
            $query = $this->db->get_where('linea', array('estado' => 1));
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }


       public function obtenerVersiones($ididea,$entregable,$idversion=0) {
       

        if($idversion==0){
          $datos=array('id_idea'=>$ididea,'id_entregable'=>$entregable);
             $query = $this->db->get_where('versiones', $datos);  
         } else {
            $datos=array('id_idea'=>$ididea,'id_entregable'=>$entregable,'id_version'=>$idversion);
             $query = $this->db->get_where('versiones', $datos);
         }
    

        echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerAyuda($identregable) {

        $this->db->select('texto_ayuda,nombre_entregable,descripcion_entregable');
        $this->db->from('entregable');
        $this->db->where('id_entregable',$identregable);
        $query=$this->db->get();

        echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    
         
    }
     public function guardarVersion($id,$idea,$entregable,$texto) {

        $fecha=date('Y-m-d H:i:s');
        $data = array(
            'id_idea' => $idea,
            'id_entregable' =>$entregable,
            'fecharegistro' => $fecha,
            'entregable' => $texto,
            'estado' => 1
        );
        
        if($id==0){
                $this->db->insert('versiones', $data);
        } else {
              $this->db->where('id_version', $id);
              $this->db->update('versiones', $data);
        }
     }

public function solicitarRevision($idea,$entregable,$version) {

        $fecha=date('Y-m-d H:i:s');
        $data = array(
            'id_idea' => $idea,
            'id_entregable' =>$entregable,
            'fecharegistro' => $fecha,
            'estado' => 2
        );
              $this->db->where('id_version', $version);
              $this->db->update('versiones', $data);
     }
     
     public function generarNuevaVersion($id,$idea,$entregable,$texto) {

        $fecha=date('Y-m-d H:i:s');
        $data = array(
            'fecharegistro' => $fecha,
            'estado' => 5
        );
              $this->db->where('id_version', $id);
              $this->db->update('versiones', $data);
        $data = array(
            'id_idea' => $idea,
            'id_entregable' =>$entregable,
            'fecharegistro' => $fecha,
            'entregable' => $texto,
            'estado' => 1
        );
                $this->db->insert('versiones', $data);     
     }


}

?>