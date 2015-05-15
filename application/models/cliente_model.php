<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Cliente_Model extends CI_Model {
    
   public function getCliente($codigo=NULL) {
       $ret='result_array';
        $this->db->select('*');
        $this->db->from('CLIENTE C');
        
         
       if(!is_null($codigo)){
            $this->db->where('C.ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
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

