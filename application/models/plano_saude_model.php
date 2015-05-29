<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Plano_saude_Model extends CI_Model {
    
   public function getPlano($codigo=NULL) {
       $ret='result_array';
        $this->db->select('*');
        $this->db->from('PLANO_SAUDE PS');
        
         
       if(!is_null($codigo)){
            $this->db->where('PS.ID', $codigo );  
            $ret='row_array';
       }
       $this->db->order_by("NOME ASC");
        $sql=$this->db->get(); 
     
        if($sql->num_rows > 0){
            return $sql->$ret();
        }else{ 
            return FALSE;
        }
    }
    
}

