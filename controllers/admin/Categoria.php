<?php ob_start(); defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
            
            $this->load->model("categorias_model", "Mcat");
            $this->categorias = $this->Mcat->lista_categorias();
        }
    
	public function index()
	{
                $dados['categorias'] = $this->categorias;
                $dados['title'] = "Admin";
                $dados['subtitle'] = " Categoria";
                
		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/categoria/ver');
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/html-footer');
	}
        public function inserir(){           
             $dados['categorias'] = $this->categorias;
             $dados['title'] = "Admin";
             $dados['subtitle'] = " Categoria";
                
             $this->load->view('backend/template/html-header', $dados);
             $this->load->view('backend/template/template');
             $this->load->view('backend/categoria/cadastrar');
	     $this->load->view('backend/template/footer');
	     $this->load->view('backend/template/html-footer');
             
        }
        public function cadastrar(){
            $this->load->library("form_validation");
            $this->form_validation->set_rules('cat-nome', "NOME DA CATEGORIA", array('required', 'is_unique[tbl_categorias.cat_nome]', 'min_length[3]'));
            if($this->form_validation->run() == FALSE){
                $this->inserir();
            }else{
                $titulo = $this->input->post('cat-nome');
                if($this->Mcat->adicionar($titulo)){
                    redirect(base_url("admin/categoria"));
                }else{
                     $this->inserir();
                }
            }

        }
        public function excluir($id){
          
                if($this->Mcat->excluir($id)){
                    redirect(base_url("admin/categoria"));
                }else{
                     $this->index();
                }
           
        }
	
 public function editar($id){           
             $dados['categoria'] = $this->Mcat->lista_categoria($id);
             $dados['title'] = "Admin";
             $dados['subtitle'] = " Categoria";
                
             $this->load->view('backend/template/html-header', $dados);
             $this->load->view('backend/template/template');
             $this->load->view('backend/categoria/editar');
	     $this->load->view('backend/template/footer');
	     $this->load->view('backend/template/html-footer');
             
        }
         public function salvar_alteracoes(){
              $id = $this->input->post('cat-id');
            $this->load->library("form_validation");
            $this->form_validation->set_rules('cat-nome', "NOME DA CATEGORIA", array('required', 'is_unique[tbl_categorias.cat_nome]', 'min_length[3]'));
            if($this->form_validation->run() == FALSE){
                $this->editar($id);
            }else{
                $titulo = $this->input->post('cat-nome');
                if($this->Mcat->editar($id, $titulo)){
                    redirect(base_url("admin/categoria"));
                }else{
                     $this->editar($id);
                }
            }

        }
}
