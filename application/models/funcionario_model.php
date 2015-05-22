<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Funcionario_Model extends CI_Model {
    
   public function getFuncionario($codigo=NULL) {
       $ret='result_array';
        $this->db->select('F.*,FN.NOME AS FUNCAO');
        $this->db->from('FUNCIONARIO AS F');
        $this->db->join('FUNCAO  FN', 'FN.ID = F.FKFUNCAO','left');
         
       if(!is_null($codigo)){
            $this->db->where('F.ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
        }else{ 
            return FALSE;
        }
    }
    public function getRelFuncionario($codigo,$campos="*") {
       $this->db->select($campos);
       $this->db->from('v_relatorio_funcionario AS VRF');
       $sql=$this->db->get(); 
        if($sql->num_rows > 0){
            return $sql->row_array();
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

