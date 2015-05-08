<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
                if($dadosUsuario['ATIVO']!='S'){
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

}
