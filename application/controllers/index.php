<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {
    public $css=null;
    public $js=null;
    public $dadosUsuario;
    public function __construct() {
        parent::__construct();
         $this->css=array('bootstrap','hover','menuHorizontal','../font-awesome/css/font-awesome.min' );    
        $this->js = array('jquery-1.10.2', 'bootstrap','jquery.dataTables.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('funcionario_model', 'funcionario');
         $this->dadosUsuario= $this->session->userdata('dadosUsuario');
         if(!isset( $this->dadosUsuario['logado'])){
            redirect();
        }
    }
    public function index() {
        $data['vazio'] = "vazio";
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/index.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function nopermission() {
        $data['vazio'] = "vazio";
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/nopermission.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function modulos($codigo = NULL) {
        $ret='result_array';
        $this->db->select('*');
        $this->db->from('SYSMODULO AS M');
         $this->db->order_by('NOME asc' );
       if(!is_null($codigo)){
            $this->db->where('ID', $codigo );  
            $ret='row_array';
       }
       
        $sql=$this->db->get(); 
        echo "<pre>";
        print_r($sql->result_array());
        echo "</pre>";
//        if($sql->num_rows > 0){
//            return $sql->$ret();
//        }else{ 
//            return FALSE;
//        } 
    }
//    public function funcionario() {
//        $data['funcionarios'] = $this->funcionario->getFuncionario();
//        $tela = array('menu' => 'telas/navigation.php',
//            'index' => 'telas/funcionario.php',
//            );
//        
//      $this->parser->adc_css($this->css);
//        $this->parser->adc_js($this->js);
//        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
//    }
}
