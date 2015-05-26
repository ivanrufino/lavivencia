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
    public function getMedicao($codigo, $mes =NULL) {
       $this->db->select('*');
       $this->db->from('v_pressao_cliente VPC');
       $this->db->where('VPC.ID_CLIENTE', $codigo );
       if(!is_null($mes)){
            $this->db->where('VPC.MES', $mes );  
       }
       $this->db->order_by("MES DESC, ANO DESC,DIA ASC");
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->result_array();
        }else{ 
            return FALSE;
        }
    }
    public function getDataMedicao($codigo) {
       $this->db->select('MES,ANO');
       $this->db->distinct();
       $this->db->from('v_pressao_cliente VPC');
       $this->db->where('VPC.ID_CLIENTE', $codigo );
       $this->db->order_by("MES DESC, ANO DESC");
      // $this->db->limit('1');
       $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->result_array();
        }else{ 
            return FALSE;
        }
    }
    /*daqui para baixo verificar o que pode ser aproveitado*/
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

