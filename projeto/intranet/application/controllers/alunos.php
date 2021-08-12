<?php

class Alunos extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('alunos_model','',TRUE);
            $this->data['menuAcademia'] = 'alunos';
	}	
	
	function index(){
		$this->gerenciar();
	}


	function gerenciar(){
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/alunos/gerenciar/';
        $config['total_rows'] = $this->alunos_model->count('alunos');
        $config['per_page'] = 20;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	
        
	    $this->data['results'] = $this->alunos_model->get('alunos','idAlunos,nomeAluno,apelido,nascimento,rg,cpf,telefone,email,rua,numero,bairro,cidade,estado,cep,update','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'alunos/alunos';
       	$this->load->view('tema/topo',$this->data);
    }


	function desativados(){
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/alunos/desativados/';
        $config['total_rows'] = $this->alunos_model->countdesativados('alunos');
        $config['per_page'] = 100;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	
        
	    $this->data['results'] = $this->alunos_model->getdesativados('alunos','idAlunos,nomeAluno,apelido,nascimento,rg,cpf,telefone,email,rua,numero,bairro,cidade,estado,cep,update','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'alunos/alunosdesativados';
       	$this->load->view('tema/topo',$this->data);
	}

	
    function adicionar() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('alunos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
        	  $nascimento = $this->input->post('nascimento');

            try {  
                $nascimento = explode('/', $nascimento);
                $nascimento = $nascimento[2].'-'.$nascimento[1].'-'.$nascimento[0];

            } catch (Exception $e) {
               $nascimento = date('Y/m/d'); 
            }
            $data = array(
                'nomeAluno' => set_value('nomeAluno'),
                'apelido' => set_value('apelido'),
                'nascimento' => $nascimento,
                'rg' => set_value('rg'),
                'cpf' => set_value('cpf'),
                'telefone' => set_value('telefone'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
                'update' => set_value('update'),
                'dataCadastro' => date('Y-m-d')
            );

            if ($this->alunos_model->add('alunos', $data) == TRUE) {
                $this->session->set_flashdata('success','Aluno adicionado com sucesso!');
                redirect(base_url() . 'index.php/alunos/alunos/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'alunos/adicionarAluno';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('alunos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
        	$nascimento = $this->input->post('nascimento');

            try {  
                $nascimento = explode('/', $nascimento);
                $nascimento = $nascimento[2].'-'.$nascimento[1].'-'.$nascimento[0];

            } catch (Exception $e) {
               $nascimento = date('Y/m/d'); 
            }
            $data = array(
                'nomeAluno' => $this->input->post('nomeAluno'),
                'apelido' => $this->input->post('apelido'),
                'nascimento' => $nascimento,
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'cep' => $this->input->post('cep'),
                'update' => $this->input->post('update')
            );

            if ($this->alunos_model->edit('alunos', $data, 'idAlunos', $this->input->post('idAlunos')) == TRUE) {
                $this->session->set_flashdata('success','Aluno editado com sucesso!');
                redirect(base_url() . 'index.php/alunos/alunos');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->alunos_model->getById($this->uri->segment(3));
        $this->data['view'] = 'alunos/editarAluno';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->alunos_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->alunos_model->getOsByAluno($this->uri->segment(3));
        $this->data['transacoes'] = $this->alunos_model->getLancamentosByAluno($this->uri->segment(3));
        $this->data['view'] = 'alunos/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            if($this->session->userdata('nivel') != 1){
                $this->session->set_flashdata('error','Você não tem permissão para essa ação.');
                redirect('mapos');
            }
            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar excluir aluno.');            
                redirect(base_url().'index.php/alunos/gerenciar/');
            }

            $this->db->where('idAlunos', $id);
            $this->db->set('ativo', 0);
            $this->db->update('alunos');


            $this->session->set_flashdata('success','Aluno excluido com sucesso!');            
            redirect(base_url().'index.php/alunos/gerenciar/');
    }



    public function ativar(){

            if($this->session->userdata('nivel') != 1){
                $this->session->set_flashdata('error','Você não tem permissão para essa ação.');
                redirect('mapos');
            }
            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar reativar aluno.');            
                redirect(base_url().'index.php/alunos/gerenciar/');
            }

            $this->db->where('idAlunos', $id);
            $this->db->set('ativo', 1);
            $this->db->update('alunos');


            $this->session->set_flashdata('success','Aluno excluido com sucesso!');            
            redirect(base_url().'index.php/alunos/gerenciar/');
    }
}

