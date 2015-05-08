<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Funcionario extends CI_Controller {
 public $css=null;
    public $js=null;
    public $dadosUsuario;
    public function __construct() {
        parent::__construct();
         $this->css=array('bootstrap','hover','menu' );    
        $this->js = array('jquery-1.10.2', 'bootstrap','jquery.dataTables.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('funcionario_model', 'funcionario');
        $this->dadosUsuario= $this->session->userdata('dadosUsuario');
        if(!isset( $this->dadosUsuario['logado'])){
            redirect();
        }
       // print_r($this->session->all_userdata());die();
    }
    public function novoFuncionario() {
       $data['escolaridades'] = $this->funcionario->getEscolaridades();
       $data['municipios'] = $this->funcionario->getMunicipios();
       $data['naturalidades'] =  $data['municipios'];
       $data['funcoes'] = $this->funcionario->getFuncoes();
       
        $tela = array('menu' => 'telas/menu.php',
            'index' => 'telas/cadastrofuncionario.php',
            );
        $this->css[]='form_funcionario';
        $this->js[]='form_funcionario';
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function inserirFuncionario() {
        $this->form_validation->set_message('is_unique', 'O campo ID não pode ser duplicado na base.');
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

    public function editar($id) {
        echo $id;
    }
    public function excluir($id) {
        echo $id;
    }
    
}
