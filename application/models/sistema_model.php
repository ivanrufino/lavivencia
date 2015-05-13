<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Sistema_Model extends CI_Model {
    
   public function getModulo($perfil, $modulo,$funcao) {

  /*     $this->db->select('SM.ID, SM.NOME,SF.NOME,SF.VLO');
       $this->db->from('SYSMODULO SM');
       $this->db->join("SYSPERFIL SP", "SP.ID = $usuario");
       $this->db->join('SYSPERFIL_SYSFUNCAO SPSF', 'SPSF.FK_SYSPERFIL = SP.ID');
       $this->db->where('SPSF.VHI =SM.VHI' , NULL);
       $this->db->join('SYSFUNCAO SF ', 'SF.VLO = SPSF.VLO');
       $this->db->where('SF.FK_SYSMODULO =SM.ID' , NULL);    
       if(!is_null($funcao)){
           $this->db->where('SF.VLO' , $funcao);        
       }
       $this->db->where('SM.ID' , $modulo);        
       $this->db->order_by('SM.ID');*/
       
        $this->db->select();
        $this->db->from('v_acesso v');
        $this->db->where('v.ID_PERFIL',$perfil);
        $this->db->where('v.ID_MODULO',$modulo);
        if(!is_null($funcao)){
            $this->db->where('v.ID_FUNCAO',$funcao);
        }
        
        $sql=$this->db->get(); 
       // echo $this->db->last_query();die();
        if($sql->num_rows > 0){
            return $sql->result_array();
        }else{ 
            return FALSE;
        }
    }
    public function getEscolaridades($codigo=NULL) {
        $ret='result_array';
        $this->db->select('*');
        $this->db->from('ESCOLARIDADE AS E');
       if(!is_null($codigo)){
            $this->db->where('ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
        }else{ 
            return FALSE;
        } 
    }
    public function getMunicipios($codigo=NULL) {
        $ret='result_array';
        $this->db->select('*');
        $this->db->from('MUNICIPIO AS M');
         $this->db->order_by('NOME asc' );
       if(!is_null($codigo)){
            $this->db->where('ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
        }else{ 
            return FALSE;
        } 
    }
    public function getFuncoes($codigo=NULL) {
        $ret='result_array';
        $this->db->select('*');
        $this->db->from('FUNCAO AS F');
        $this->db->where('NOME IS NOT NULL',NULL);
         $this->db->order_by('NOME asc' );
       if(!is_null($codigo)){
            $this->db->where('ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
        }else{ 
            return FALSE;
        } 
    }
    public function novoFuncionario($dados) {
       
        if( $this->db->insert('FUNCIONARIO',$dados)){
            return TRUE;           
        }
        return FALSE;
    }
    public function alteraFuncionario($dados,$id) {
         $this->db->where('ID', $id);
        if( $this->db->update('FUNCIONARIO',$dados)){
            return TRUE;           
        }
        return FALSE;
    }
    public function excluirFuncionario($id) {
        if($this->db->delete('FUNCIONARIO', array('ID' => $id))){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

