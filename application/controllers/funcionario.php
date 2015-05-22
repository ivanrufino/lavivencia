<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
define('INCLUIR', '1');
define('EDITAR', '2');
define('EXCLUIR', '3');
define('RELATORIO', '4');

class Funcionario extends CI_Controller {
 public $css=null;
    public $js=null;
    public $dadosUsuario;
    private $idModulo = 'funcionario';
    
    public function __construct() {
        parent::__construct();
         $this->css=array('bootstrap','hover','menuHorizontal','../font-awesome/css/font-awesome.min' );    
        $this->js = array('jquery-1.10.2', 'bootstrap','jquery.dataTables.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('funcionario_model', 'funcionario');
        //$this->load->model('Sistema_Model', 'sistema');
        $this->dadosUsuario= $this->session->userdata('dadosUsuario');
        if(!isset( $this->dadosUsuario['logado'])){
            redirect();
        }
        $modulos =$this->sistema->permissao($this->dadosUsuario,$this->idModulo);       
        foreach ($modulos as $modulo) {
            $this->funcoes[]=$modulo['ID_FUNCAO'];
        }     
    }
    public function index() {
        $data['funcoes']= $this->funcoes;
        $data['funcionarios'] = $this->funcionario->getFuncionario();
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/funcionario.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function incluir() {
       $this->sistema->permissao($this->dadosUsuario,$this->idModulo,INCLUIR);
       $data['escolaridades'] = $this->funcionario->getEscolaridades();
       $data['municipios'] = $this->funcionario->getMunicipios();
       $data['naturalidades'] =  $data['municipios'];
       $data['funcoes'] = $this->funcionario->getFuncoes();
       
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/cadastrofuncionario.php',
            );
        $this->css[]='form_funcionario';
        $this->js[]='form_funcionario';
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
        
    }
    public function inserirFuncionario() {
       // $this->form_validation->set_message('is_unique', 'O campo ID não pode ser duplicado na base.');
        $this->form_validation->set_rules('ID', 'ID', 'required|integer');
        $this->form_validation->set_rules('NOME', 'NOME', 'required');
        $this->form_validation->set_rules('INSCRICAO', 'INSCRICAO', 'required');
        //$this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->novoFuncionario();
        } else {
            $dados = $this->input->post();
            $dados['ID'] = (int) $dados['ID'];
            $dados['INATIVO'] = isset($dados['INATIVO']) ? 'N' : 'S';
            foreach ($dados as $key => $value) {
                if ($dados[$key] == "") {
                    $dados[$key] = NULL;
                }
            }
            if ($this->funcionario->novoFuncionario($dados)) {
                $this->session->set_flashdata('msg', 'Funcionario salvo com sucesso.');
                redirect('funcionario');
            }
        }
    }
    public function alterar_funcionario($id) {
        //$this->form_validation->set_rules('ID', 'ID', 'required|integer'); 
        $this->form_validation->set_rules('NOME', 'NOME', 'required');
       // $this->form_validation->set_rules('INSCRICAO', 'INSCRICAO', 'required');
        //$this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->editar($id);
        } else {
            $dados = $this->input->post();
           
            $dados['INATIVO'] = isset($dados['INATIVO']) ? 'N' : 'S';
            foreach ($dados as $key => $value) {
                if ($dados[$key] == "") {
                    $dados[$key] = NULL;
                }
            }
           // $dados = $this->utf8_decoder($dados);
            if ($this->funcionario->alteraFuncionario($dados,$id)) {
                $this->session->set_flashdata('msg', 'Funcionario salvo com sucesso.');
                redirect('funcionario');
            }
        }
    }
    public function editar($id) {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,EDITAR);
       $data['funcionario'] = $this->utf8_converter($this->funcionario->getFuncionario($id));//die(var_dump($data));
       $data['escolaridades'] = $this->funcionario->getEscolaridades();
       $data['municipios'] = $this->funcionario->getMunicipios();
       $data['naturalidades'] =  $data['municipios'];
       $data['funcoes'] = $this->funcionario->getFuncoes();
       
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/alterafuncionario.php',
            );
        $this->css[]='form_funcionario';
        $this->js[]='form_funcionario';
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function excluir($id) {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,EXCLUIR);
        if($this->funcionario->excluirFuncionario($id)){
           $this->session->set_flashdata('msg', 'Funcionário excluido com sucesso.');
        }
        redirect('funcionario');
    }
    public function gerarRelatorio($id, $tipo = 'doc') {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,RELATORIO);
        $this->load->helper('file');
        $this->load->helper('download');
        $funcionario = $this->funcionario->getFuncionario($id);
        $data='';
        $nome=$funcionario['NOME'].".".$tipo;
//        
//        $data['escolaridades'] = $this->funcionario->getEscolaridades();
//       $data['municipios'] = $this->funcionario->getMunicipios();
//       $data['naturalidades'] =  $data['municipios'];
//       $data['funcoes'] = $this->funcionario->getFuncoes();
        
        
        $funcionario['MUNICIPIO']= $funcionario['FKMUNICIPIO']!=""? $this->funcionario->getMunicipios($funcionario['FKMUNICIPIO'])['NOME']:"";
        $funcionario['NATURALIDADE']=$funcionario['FKNATURALIDADE']!=""? $this->funcionario->getMunicipios($funcionario['FKNATURALIDADE'])['NOME']:"";
        $funcionario['ESCOLARIDADE']=$funcionario['FKESCOLARIDADE']!=""? $this->funcionario->getEscolaridades($funcionario['FKESCOLARIDADE'])['NOME']:"";
        
        unset($funcionario['FKMUNICIPIO']);
        unset($funcionario['FKNATURALIDADE']);
        unset($funcionario['FKPAIS']);
        unset($funcionario['FKESCOLARIDADE']);
        unset($funcionario['FKFUNCAO']);
        
       
        foreach ($funcionario as $key => $value) {  unset($funcionario['FKMUNICIPIO']);
            switch ($key) {
                case "FKMUNICIPIO":
                    unset($funcionario['FKMUNICIPIO']);
                    continue;
                   
                default:
                    break;
            }
            $data.= str_pad("$key:", 20 , ".") ."$value \n ";
        }
//        echo $data;
//        die();
       // $data = utf8_encode($data);
        
        force_download($nome, $data);
//        if (!write_file("./assets/relatorios/".$nome, $data,'r+')) {
//            echo 'Unable to write the file';
//        } else {
//            echo 'File written!';
//        }
    }
    public function utf8_converter($array) {
        array_walk_recursive($array, function(&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }
    public function utf8_decoder($array) {
        return $array;
        array_walk_recursive($array, function(&$item, $key) {
            if (mb_detect_encoding($item, 'utf-8', true)) {
                $item = html_entity_decode($item);
            }
        });

        return $array;
    }
    

}
