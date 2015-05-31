<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* funções padrões | outras funções podem ser criadas */
define('INCLUIR', '1');
define('EDITAR', '2');
define('EXCLUIR', '3');
define('RELATORIO', '4');
define('VISUALIZAR_PA', '5');
define('MARCAR_PA', '6');

class Usuario extends CI_Controller {

    public $css = null;
    public $js = null;
    public $dadosUsuario;
    private $idModulo = 'cliente';
    private $funcoes = array();

    public function __construct() {
        parent::__construct();
        $this->css = array('bootstrap', 'hover', 'menuHorizontal', '../font-awesome/css/font-awesome.min');
        $this->js = array('jquery-1.10.2', 'bootstrap', 'jquery.dataTables.min', 'jquery.form.min');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('cliente_model', 'cliente');
        $this->load->model('funcionario_model', 'funcionario');
        //$this->load->model('Sistema_Model', 'sistema');
        $this->dadosUsuario = $this->session->userdata('dadosUsuario');
        if (!isset($this->dadosUsuario['logado'])) {
            redirect();
        }
        $modulos = $this->sistema->permissao($this->dadosUsuario, $this->idModulo);
        // die(print_r($modulos));
        foreach ($modulos as $modulo) {
            $this->funcoes[] = $modulo['ID_FUNCAO'];
        }
    }

    public function index() {
        $data['funcoes']= $this->funcoes;
        $data['usuarios'] = $this->usuario->getUsuario();
     
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/usuario.php',
            );
        
      $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }

    public function incluir() {
       $this->sistema->permissao($this->dadosUsuario,$this->idModulo,INCLUIR);
       $data['planos'] = $this->plano->getPlano();
       $data['dietas'] = $this->cliente->getDieta();
       $data['municipios'] = $this->funcionario->getMunicipios();
//       $data['naturalidades'] =  $data['municipios'];
//       $data['funcoes'] = $this->funcionario->getFuncoes();
       
        
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/cadastro/cliente.php',
            );
        $this->css[]='form_funcionario';
        $this->js[]='form_funcionario';
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    public function inserirCliente() {
        $this->form_validation->set_rules('NOME', 'NOME', 'required');
        $this->form_validation->set_rules('INSCRICAO', 'INSCRICAO', 'required');
        $this->form_validation->set_rules('DTNASCIMENTO', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('nome_contato', 'Nome contato', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->incluir();
        } else {
            $dadosContato = array(
                'NOME'          =>  $this->input->post('nome_contato'),
                'PARENTESCO'    =>  $this->input->post('PARENTESCO'),
                'ENDERECO'      =>  $this->input->post('ENDERECO'),
                'SUBBAIRRO'     =>  $this->input->post('SUBBAIRRO'),
                'BAIRRO'        =>  $this->input->post('BAIRRO'),
                'FK_MUNICIPIO'   => $this->input->post('FKMUNICIPIO'),
                'CEP'           =>  $this->input->post('CEP'),
                'UF'            =>  $this->input->post('UF'),
                'REFERENCIAS'   =>  $this->input->post('REFERENCIAS'),
                'IDENTIDADE'    =>  $this->input->post('identidade_contato'),
                'ORGAO'         =>  $this->input->post('orgao_contato'),
                'TELEFONES'     =>  $this->input->post('TELEFONES'),
                'EMAIL'         =>  $this->input->post('EMAIL'),
                'DT_NASCIMENTO' =>  $this->input->post('dt_nascimento_contato'),
            );
            
            $dadosCliente = array(
                'NOME'          => $this->input->post('NOME'),
                'INSCRICAO'     => $this->input->post('INSCRICAO'),
                'DT_NASCIMENTO'  => $this->input->post('DTNASCIMENTO'),
                'EST_CIVIL'   => $this->input->post('ESTADOCIVIL'),
                'CPF'           => $this->input->post('CPF'),
                'IDENTIDADE'    => $this->input->post('IDENTIDADE'),
                'ORGAO'         => $this->input->post('ORGAO'),
                'COBRE_INTERNACAO'=> $this->input->post('COBRE_INTERNACAO'),
                'COBRE_REMOCAO' => $this->input->post('COBRE_REMOCAO'),
                'TEMPORARIO'    => $this->input->post('TEMPORARIO'),
                'FK_PLANO_SAUDE'=> $this->input->post('FK_PLANO_SAUDE')==""? NULL:$this->input->post('FK_PLANO_SAUDE'),
                'QUARTO'        => $this->input->post('QUARTO'),
                'CAMA'          => $this->input->post('CAMA'),
                'FK_DIETA'      => $this->input->post('FK_DIETA')==""? NULL:$this->input->post('FK_DIETA'),
                'ORIGEM'        => $this->input->post('ORIGEM'),
                'DIAGNOSTICO'   => $this->input->post('DIAGNOSTICO'),
                'OBSERVACAO'    => $this->input->post('OBSERVACAO'),
                'DT_SAIDA'      => $this->input->post('DT_SAIDA')==""? NULL:$this->input->post('DT_SAIDA'),
                'MOTIVO_SAIDA'  => $this->input->post('MOTIVO_SAIDA'),
                
            );
            $dadosCliente['FK_CONTATO'] = $this->cliente->novoContato($dadosContato);
            if ($dadosCliente['FK_CONTATO']) {
                if($this->cliente->novoCliente($dadosCliente)){
                    $this->session->set_flashdata('msg', 'Cliente salvo com sucesso.');
                    redirect('cliente');
                }else{
                    $this->session->set_flashdata('msg', 'Houve uma falha na gravação do Cliente.');
                    $this->incluir();
                }
            }else{
               $this->session->set_flashdata('msg', 'Houve uma falha na gravação do Contato.');
               $this->incluir(); 
            }
        }
    }

    public function editar($id) {
        $this->sistema->permissao($this->dadosUsuario, $this->idModulo, EDITAR);
        $data['planos'] = $this->plano->getPlano();
        $data['dietas'] = $this->cliente->getDieta();
        $data['municipios'] = $this->funcionario->getMunicipios();
        $data['cliente'] = $this->cliente->getCliente($id);
        $data['contato'] = $this->cliente->getContato($data['cliente']['FK_CONTATO']);
//       $data['naturalidades'] =  $data['municipios'];
//       $data['funcoes'] = $this->funcionario->getFuncoes();
       
        
        $tela = array('menu' => 'telas/navigation.php',
            'index' => 'telas/edita/cliente.php',
            );
        $this->css[]='form_funcionario';
        $this->js[]='form_funcionario';
        $this->parser->adc_css($this->css);
        $this->parser->adc_js($this->js);
        
        $this->parser->mostrar('templates/templatePrincipal.php', $tela, $data);
    }
    
    public function alterar_cliente($id) {        
        $this->form_validation->set_rules('NOME', 'NOME', 'required');
        $this->form_validation->set_rules('INSCRICAO', 'INSCRICAO', 'required');
        $this->form_validation->set_rules('DTNASCIMENTO', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('nome_contato', 'Nome contato', 'required');
        
      if ($this->form_validation->run() == FALSE) {
            $this->editar($id);
        } else {
            $dadosContato = array(
                'NOME'          =>  $this->input->post('nome_contato'),
                'PARENTESCO'    =>  $this->input->post('PARENTESCO'),
                'ENDERECO'      =>  $this->input->post('ENDERECO'),
                'SUBBAIRRO'     =>  $this->input->post('SUBBAIRRO'),
                'BAIRRO'        =>  $this->input->post('BAIRRO'),
                'FK_MUNICIPIO'   => $this->input->post('FKMUNICIPIO'),
                'CEP'           =>  $this->input->post('CEP'),
                'UF'            =>  $this->input->post('UF'),
                'REFERENCIAS'   =>  $this->input->post('REFERENCIAS'),
                'IDENTIDADE'    =>  $this->input->post('identidade_contato'),
                'ORGAO'         =>  $this->input->post('orgao_contato'),
                'TELEFONES'     =>  $this->input->post('TELEFONES'),
                'EMAIL'         =>  $this->input->post('EMAIL'),
                'DT_NASCIMENTO' =>  $this->input->post('dt_nascimento_contato'),
            );
            
            $dadosCliente = array(
                'NOME'          => $this->input->post('NOME'),
                'INSCRICAO'     => $this->input->post('INSCRICAO'),
                'DT_NASCIMENTO'  => $this->input->post('DTNASCIMENTO'),
                'EST_CIVIL'   => $this->input->post('ESTADOCIVIL'),
                'CPF'           => $this->input->post('CPF'),
                'IDENTIDADE'    => $this->input->post('IDENTIDADE'),
                'ORGAO'         => $this->input->post('ORGAO'),
                'COBRE_INTERNACAO'=> $this->input->post('COBRE_INTERNACAO'),
                'COBRE_REMOCAO' => $this->input->post('COBRE_REMOCAO'),
                'TEMPORARIO'    => $this->input->post('TEMPORARIO'),
                'FK_PLANO_SAUDE'=> $this->input->post('FK_PLANO_SAUDE')==""? NULL:$this->input->post('FK_PLANO_SAUDE'),
                'QUARTO'        => $this->input->post('QUARTO'),
                'CAMA'          => $this->input->post('CAMA'),
                'FK_DIETA'      => $this->input->post('FK_DIETA')==""? NULL:$this->input->post('FK_DIETA'),
                'ORIGEM'        => $this->input->post('ORIGEM'),
                'DIAGNOSTICO'   => $this->input->post('DIAGNOSTICO'),
                'OBSERVACAO'    => $this->input->post('OBSERVACAO'),
                'DT_SAIDA'      => $this->input->post('DT_SAIDA')==""? NULL:$this->input->post('DT_SAIDA'),
                'MOTIVO_SAIDA'  => $this->input->post('MOTIVO_SAIDA'),
                
            );
           $msg="";
            if($this->cliente->alteraContato($dadosContato,$this->input->post('FK_CONTATO'))){
                $msg ='Dados salvo com sucesso.<br>';
            }
            if($this->cliente->alterarCliente($dadosCliente,$id)){
                $msg .='Dados salvo com sucesso.<br>';
                   
            }
            
            if($msg==""){
                $msg .='Houve uma falha na gravação do Cliente.';
                $this->editar($id);   
                
            }else{
             $this->session->set_flashdata('msg', $msg);                
                redirect('cliente');
            }
            
        }
    }
    public function excluir($id) {
       $this->sistema->permissao($this->dadosUsuario,$this->idModulo,EXCLUIR);
        if($this->cliente   ->excluirCliente($id)){
           $this->session->set_flashdata('msg', 'Cliente excluido com sucesso.');
        }
        redirect('cliente');
    }

    public function gerarRelatorio($id, $tipo = 'pdf') {
        $this->sistema->permissao($this->dadosUsuario, $this->idModulo, RELATORIO);
        echo "relatorio";
    }

    public function pressaoArterial($id_cliente) {
        $this->sistema->permissao($this->dadosUsuario, $this->idModulo, VISUALIZAR_PA);
        $data['ID'] = $id_cliente;
        $data['medicoes'] = $this->cliente->getMedicao($id_cliente, date('n'));
        $data['datas'] = $this->cliente->getDataMedicao($id_cliente);
//        asort($data['datas']);

        $tela = $this->load->view('telas/modal/medicaoPA', $data, true);
        echo $tela;
    }

    public function consultarPressaoArterial($id_cliente, $mes = NULL) {
        $mes = is_null($mes) ? date('m') : $mes;
        echo $mes;
    }

    public function marcarPressaoArterial() {
        $this->form_validation->set_rules('responsavel_tecnico', 'Responsável Técnico', 'required');
        $this->form_validation->set_rules('responsavel_anotacao', 'Responsável Anotação', 'required');

        $this->form_validation->set_rules('PS', 'PS', 'required|integer');
        $this->form_validation->set_rules('PD', 'PD', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $erro = "<div class='alert alert-danger'";
            $erro .= validation_errors();
            $erro .= "</div>";
            echo $erro;
        } else {
            
            $this->db->trans_begin();

            $this->db->query('AN SQL QUERY...');
            $this->db->query('ANOTHER QUERY...');
            $this->db->query('AND YET ANOTHER QUERY...');

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
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

}
