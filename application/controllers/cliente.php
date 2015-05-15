<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*funções padrões | outras funções podem ser cri*/
define('INCLUIR', '1');
define('ALTERAR', '2');
define('EXCLUIR', '3');
define('RELATORIO', '4');

class Cliente extends CI_Controller {

    public $css = null;
    public $js = null;
    public $dadosUsuario;
    private $idModulo = 1;

    public function __construct() {
        parent::__construct();
        $this->css = array('bootstrap', 'hover', 'menuHorizontal');
        $this->js = array('jquery-1.10.2', 'bootstrap', 'jquery.dataTables.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('cliente_model', 'cliente');
        //$this->load->model('Sistema_Model', 'sistema');
        $this->dadosUsuario = $this->session->userdata('dadosUsuario');
        if (!isset($this->dadosUsuario['logado'])) {
            redirect();
        }
        $modulos = $this->sistema->permissao($this->dadosUsuario['ID_PERFIL'], $this->idModulo);
    }

    public function index() {
        $data['clientes'] = $this->cliente->getCliente();
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/cliente.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }

}
