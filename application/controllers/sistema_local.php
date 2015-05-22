<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//a classe tem esse nome devido a conflito com outra classe nativa
class Sistema_local extends CI_Controller {
    public $css = null;
    public $js = null;
    public $dadosUsuario;
    

    public function __construct() {
        parent::__construct();
        $this->css = array('bootstrap', 'hover', 'menuHorizontal','../font-awesome/css/font-awesome.min');
        $this->js = array('jquery-1.10.2', 'bootstrap', 'jquery.dataTables.min');
        
        //$this->load->model('usuario_model', 'usuario');
        //$this->load->model('cliente_model', 'cliente');
        //$this->load->model('Sistema_Model', 'sistema');
        /*$this->dadosUsuario = $this->session->userdata('dadosUsuario');
        if (!isset($this->dadosUsuario['logado'])) {
            redirect();
        }
        $modulos = $this->sistema->permissao($this->dadosUsuario, $this->idModulo);*/
       
       
    }
    public function index() {
        $data['mensagem'] = "a mensagem é esta";
        //load the view and saved it into $html variable
        $html=$this->load->view('telas/relatorio', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath =  "./assets/output_pdf_name.pdf";
        //load mPDF library
         $this->load->library('pdf');
        $pdf = $this->pdf->load();
        //generate the PDF from the given html
        $pdf->WriteHTML($html);  
        //download it.
        $pdf->Output();
        
    }
}