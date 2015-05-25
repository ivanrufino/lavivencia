<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*funções padrões | outras funções podem ser criadas*/
define('INCLUIR', '1');
define('EDITAR', '2');
define('EXCLUIR', '3');
define('RELATORIO', '4');
define('VISUALIZAR_PA', '5');
define('MARCAR_PA', '6');
class Cliente extends CI_Controller {

    public $css = null;
    public $js = null;
    public $dadosUsuario;
    private $idModulo = 'cliente';
    private $funcoes = array();

    public function __construct() {
        parent::__construct();
        $this->css = array('bootstrap', 'hover', 'menuHorizontal','../font-awesome/css/font-awesome.min');
        $this->js = array('jquery-1.10.2', 'bootstrap', 'jquery.dataTables.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('cliente_model', 'cliente');
        //$this->load->model('Sistema_Model', 'sistema');
        $this->dadosUsuario = $this->session->userdata('dadosUsuario');
        if (!isset($this->dadosUsuario['logado'])) {
            redirect();
        }
        $modulos = $this->sistema->permissao($this->dadosUsuario, $this->idModulo);
       // die(print_r($modulos));
        foreach ($modulos as $modulo) {
            $this->funcoes[]=$modulo['ID_FUNCAO'];
        }
       
    }

    public function index() {
        $data['funcoes']= $this->funcoes;
        $data['clientes'] = $this->cliente->getCliente();
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/cliente.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function incluir() {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,INCLUIR);
        echo "incluir";
    }
    public function editar($id) {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,EDITAR);
        echo "editar";
    }
    public function excluir($id) {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,EXCLUIR);
        echo "excluir";
    }
    public function gerarRelatorio($id, $tipo = 'pdf') {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,RELATORIO);
         echo "relatorio";
    }
    public function pressaoArterial($id_cliente) {
        $this->sistema->permissao($this->dadosUsuario,$this->idModulo,VISUALIZAR_PA);
        $data['medicoes'] = $this->cliente->getMedicao($id_cliente);
        $data['datas']= $this->cliente->getDataMedicao($id_cliente);
        asort($data['datas']);
        
        $tela=$this->load->view('telas/modal/medicaoPA', $data, true);
        echo $tela;
    }
    public function consultarPressaoArterial($id_cliente,$mes = NULL) {
        $mes = is_null($mes)? date('m'):$mes;
        echo $mes;
    }
    public function marcarPressaoArterial($id_cliente,$mes = NULL) {
        $mes = is_null($mes)? date('m'):$mes;
        echo $mes;
    }
    

}
