<?php

class Planos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('planos_model', '', TRUE);
        $this->data['menuAcademia'] = 'Planos';
    }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/planos/gerenciar/';
        $config['total_rows'] = $this->planos_model->count('planos');
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

		$this->data['results'] = $this->planos_model->get('planos','idPlanos,nome,descricao,preco','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'planos/planos';
       	$this->load->view('tema/topo',$this->data);

       
		
    }
	
    function adicionar() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('planos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $preco = $this->input->post('preco');
            $preco = str_replace(",","", $preco);

            $data = array(
                'nome' => set_value('nome'),
                'descricao' => set_value('descricao'),
                'preco' => $preco
            );

            if ($this->planos_model->add('planos', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Plano adicionado com sucesso!');
                redirect(base_url() . 'index.php/planos/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'planos/adicionarPlano';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('planos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $preco = $this->input->post('preco');
            $preco = str_replace(",","", $preco);
            $data = array(
                'nome' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'preco' => $preco
            );

            if ($this->planos_model->edit('planos', $data, 'idPlanos', $this->input->post('idPlanos')) == TRUE) {
                $this->session->set_flashdata('success', 'Plano editado com sucesso!');
                redirect(base_url() . 'index.php/planos/editar/'.$this->input->post('idPlanos'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $this->data['result'] = $this->planos_model->getById($this->uri->segment(3));

        $this->data['view'] = 'planos/editarPlano';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->planos_model->getById($this->uri->segment(3));
        $this->data['transacoes'] = $this->planos_model->getLancamentosAcademiaByPlano($this->uri->segment(3));
        $this->data['view'] = 'planos/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    function excluir(){

       
        if($this->session->userdata('nivel') != 1){
            $this->session->set_flashdata('error','Você não tem permissão para essa ação.');
            redirect('mapos');
        }
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir serviço.');            
            redirect(base_url().'index.php/planos/gerenciar/');
        }

        $this->db->where('idPlanos', $id);
        $this->db->delete('planos');

        $this->planos_model->delete('planos','idPlanos',$id);             
        

        $this->session->set_flashdata('success','Serviço excluido com sucesso!');            
        redirect(base_url().'index.php/planos/gerenciar/');
    }
}

