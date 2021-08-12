<?php

class Mensalidadesacademia extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('mensalidadesacademia_model', '', TRUE);
        $this->data['menuAcademia'] = 'Mensalidades Academia';
    }

    function index(){
	   $this->mensalidadesAcademia();
    }

    function mensalidadesAcademia(){
        
        $this->load->library('table');
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'mensalidadesAcademia/mensalidadesAcademia';
        $config['total_rows'] = $this->mensalidadesacademia_model->countmensalidadesacademia('mensalidades_academia');
        $config['per_page'] = 1000;
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
       
	    $this->data['view'] = 'mensalidadesAcademia/mensalidadesAcademia';
       	$this->load->view('tema/topo',$this->data);	
    }
    
    	public function mensalidadesAcademiaPagas(){
			    $this->data['view'] = 'mensalidadesAcademia/mensalidadesAcademiaPagas';
       	$this->load->view('tema/topo',$this->data);
       	}
    
    }