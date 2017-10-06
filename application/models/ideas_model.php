<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ideas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerEstudiantes($idEstudiante = 0) {
        $dbdatos = $this->load->database('proyectandooracle', TRUE);
        $dbdatos->select('DISTINCT(art_histac_act.GRU_CODIGO) as id_grupo');
        $dbdatos->join('art_histac_act','art_estudiantes.EST_CODIGO=art_histac_act.EST_CODIGO');
        $dbdatos->where('art_estudiantes.CLI_NUMDCTO', $idEstudiante);
        $grupo = $dbdatos->get('art_estudiantes')->row()->id_grupo;
       // echo  $dbdatos->last_query();
        
        $dbdatos->select('art_estudiantes.CLI_NUMDCTO as id_usuario,art_estudiantes.CLI_NOMBRE_COMP as nombre_usuario');
        $dbdatos->join('art_histac_act','art_estudiantes.EST_CODIGO=art_histac_act.EST_CODIGO');
        $dbdatos->where('art_histac_act.GRU_CODIGO', $grupo);
        return $query = $dbdatos->get('art_estudiantes');
       
    }

    public function guardar($nombreidea,$descripidea,$integrantes,$idEstudiante,$linea,$objetivogeneral,$objetivoespecifico,$tipo) {

        if($tipo==1){
        $data = array(
            'id_linea' => $linea,
            'nombre_idea' => $nombreidea,
            'descripcion_idea' => $descripidea,
            'objetivo_general' => $objetivogeneral,
            'objetivo_especifico' => $objetivoespecifico,
            'estado' => 1,
        );
         $this->db->insert('ideas_banco', $data);    
            
        } else {
        $dbdatos = $this->load->database('proyectandooracle', TRUE);
        $dbdatos->select('DISTINCT(art_histac_act.GRU_CODIGO) as id_grupo');
        $dbdatos->join('art_histac_act','art_estudiantes.EST_CODIGO=art_histac_act.EST_CODIGO');
        $dbdatos->where('art_estudiantes.CLI_NUMDCTO', $idEstudiante);
        $grupo = $dbdatos->get('art_estudiantes')->row()->id_grupo;
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
    }
    public function mostrarIntegrantes($ididea) {

        $this->db->select('*');
        $this->db->from('equipos');
        $this->db->join('ideas','equipos.id_idea=ideas.id_idea');
        $this->db->where('equipos.id_usuario',$ididea);
        $this->db->where('ideas.estado',3);
       // echo  $this->db->last_query();
         $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function conteoIdeasActivas($usuario) {

        $this->db->select('COUNT(*) as conteo');
        $this->db->from('ideas');
        $this->db->join('equipos','equipos.id_idea=ideas.id_idea');
        $this->db->where('ideas.estado',3);
        $this->db->where('equipos.id_usuario',$usuario);
       // echo  $this->db->last_query();
         return $this->db->get()->row()->conteo;
    }


    public function obtenerParametrizacion($idIdea) {

       // SELECT * FROM ideas INNER JOIN config ON ideas.id_grupo= config.GRU_CODIGO AND ideas.id_idea=1 
        
        $this->db->select('config.id_parametrizacion','parametrizacion');
        $this->db->from('ideas');
        $this->db->join('config','ideas.id_grupo= config.GRU_CODIGO');
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
    

       // echo  $this->db->last_query();
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
     public function obtenerideabanco($idea) {
        
            $query = $this->db->get_where('ideas_banco', array('id_idea' => $idea));
       // echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }


}

?>