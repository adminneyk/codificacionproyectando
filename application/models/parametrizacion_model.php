<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametrizacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtenerParametrizacion() {
        
             $query = $this->db->get('parametrizacion');
        //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function obtenerMaterias() {
        $db_prueba = $this->load->database('proyectandooracle', TRUE);
        $query = $db_prueba->get_where('art_materias',array());
        //echo $db_prueba->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function guardar($nombrepara,$descritarea,$estado,  $id = 0) {
        $data = array(
            'nom_parametrizacion' => $nombrepara,
            'descripcion_parametrizacion' => $descritarea,
            'estado' => $estado
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
        //secho  $this->db->last_query();
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
    
    public function obtenerCursos($uduario = 0) {
        
            $query = $this->db->get_where('grupo', array('id_responsable'=>$uduario,'id_parametrizacion'=>0));
        
       //echo  $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function guardaParambase(
                        $publicacion,
                        $idgrupo,
                        $profesor
                ){
        $data = array(
            'id_parametrizacion' => $publicacion,
            'id_responsable' => $profesor    
        );
        
            $this->db->where('id_grupo', $idgrupo);
            
            return $this->db->update('grupo', $data);
             
        
    }
    
        public function inforActividadFase($idactividad) {

        $this->db->select('fases.nombre_fase,actividad.nombre_actividad');
        $this->db->from('fases');
        $this->db->join('actividad', 'actividad.id_fase=fases.id_fase');
        $this->db->where('actividad.id_actividad', $idactividad);
        return $query = $this->db->get();
        
    }
    public function materiaHorario($horario) {

    $db_prueba = $this->load->database('proyectandooracle', TRUE);
        $query = $db_prueba->get_where('art_horario',array("MAT_CODIGO" => $horario));
        //echo $db_prueba->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }

}
    public function asignacionConfig($materia,$marcotrabajo,$grupo){
        $data = array(
            'MAT_CODIGO' => $materia,
            'GRU_CODIGO' => $grupo,
            'id_parametrizacion' => $marcotrabajo
        );
        
        return $this->db->insert('config', $data);
             
        
    }


}

?>