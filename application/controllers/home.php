<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    public $css=null;
    public $js=null;
    public function __construct() {
        parent::__construct();
        $this->css=array('bootstrap','hover','menuHorizontal' );    
        $this->js = array('jquery-1.10.2', 'bootstrap','jquery.dataTables.min');
        $this->load->model('usuario_model','usuario');
    }
    public function index() {
        if (true){
            $this->login();
        }
    }
    public function login($erros =NULL) {
        $erro[1]="Usuário ou senha incorretos.";
        $erro[2]="Usuário inativo.<br>Entre em contato com o administrador do sistema.";
        if(!is_null($erros)){
            $dados['erros']=$erro[$erros];
        }else{
            $dados['erros']="";
        }
        $this->load->view('telas/login.php',$dados);
    }
    public function logar() {
        $usuario = $this->input->post('login');
        $senha = $this->input->post('senha');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $dadosUsuario = $this->usuario->logar($usuario,$senha);
            if($dadosUsuario){
                if($dadosUsuario['STATUS']!='1'){
                    $this->login(2); 
                }else{
                    unset($dadosUsuario['SENHA']);
                    $dadosUsuario['logado']='s';
                    $this->session->set_userdata("dadosUsuario", $dadosUsuario);
                    redirect('index');
                }
            }else{
                $this->login(1); 
            }
        }
    }

    public function logout() {
        redirect();
    }
    public function teste() {
         $data['vazio'] = "vazio";
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/index.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
        
    }
}
