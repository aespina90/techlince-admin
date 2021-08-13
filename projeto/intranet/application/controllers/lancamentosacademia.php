<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lancamentosacademia extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
        	redirect('mapos/login');
        }
        $this->load->model('lancamentosacademia_model','',TRUE);
        $this->data['menuAcademia'] = 'Mensalidades Academia';
        $this->load->helper(array('codegen_helper'));
	}
	public function index(){
		$this->lancamentosAcademia();
	}

	public function lancamentosAcademia(){
		
		$where = '';
		$periodo = $this->input->get('periodo');
		$situacao = $this->input->get('situacao');


		// busca lançamentos do dia 
		if($periodo == null || $periodo == 'dia'){
			
				if(! isset($situacao) || $situacao == 'todos'){
				
					$where = 'data_vencimento = "'.date('Y-m-d'.'"');

				}
				else{
					if($situacao == 'previsto'){
						$where = 'data_vencimento = "'.date('Y-m-d'.'"').' AND baixado = "0"'; 
					}
					else{
						if($situacao == 'atrasado'){
							$where = 'data_vencimento = "'.date('Y-m-d'.'"').' AND baixado = "0"'; 
						}
						else{
							if($situacao == 'realizado'){
							$where = 'data_vencimento = "'.date('Y-m-d'.'"').' AND baixado = "1"'; 
						}
						else{
							$where = 'data_vencimento = "'.date('Y-m-d'.'"');
						}
						}
					}
				}
		
		

		} // fim lançamentos dia


		else{

			// busca lançamentos da semana
			if($periodo == 'semana'){
				$semana = $this->getThisWeek();

				if(! isset($situacao) || $situacao == 'todos'){
				
					$where = 'data_vencimento BETWEEN "'.$semana[0].'" AND "'.$semana[1].'"'; 

				}
				else{
					if($situacao == 'previsto'){
						$where = 'data_vencimento BETWEEN "'.date('Y-m-d').'" AND "'.$semana[1].'" AND baixado = "0"'; 
					}
					else{
						if($situacao == 'atrasado'){
							$where = 'data_vencimento BETWEEN "'.$semana[0].'" AND "'.date('Y-m-d').'" AND baixado = "0"'; 
						}
						else{
							$where = 'data_vencimento BETWEEN "'.$semana[0].'" AND "'.$semana[1].'" AND baixado = "1"';
						}
					}
				}
			
			} // fim lançamentos da semana
			else{

				// busca lançamento do mês


				if($periodo == 'mes'){
					
					$mes = $this->getThisMonth();
					
					if(! isset($situacao) || $situacao == 'todos'){
				
						$where = 'data_vencimento BETWEEN "'.$mes[0].'" AND "'.$mes[1].'"'; 

					}
					else{
						if($situacao == 'previsto'){
							$where = 'data_vencimento BETWEEN "'.date('Y-m-d').'" AND "'.$mes[1].'" AND baixado = "0"'; 
						}
						else{
							if($situacao == 'atrasado'){
								$where = 'data_vencimento BETWEEN "'.$mes[0].'" AND "'.date('Y-m-d').'" AND baixado = "0"'; 
							}
							else{
								$where = 'data_vencimento BETWEEN "'.$mes[0].'" AND "'.$mes[1].'" AND baixado = "1"';
							}
						}
					}
				}

				// busca lançamentos do ano
				else{
					$ano = $this->getThisYear();
					
					if(! isset($situacao) || $situacao == 'todos'){
				
						$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'"';

					}
					else{
						if($situacao == 'previsto'){
							$where = 'data_vencimento BETWEEN "'.date('Y-m-d').'" AND "'.$ano[1].'" AND baixado = "0"'; 
						}
						else{
							if($situacao == 'atrasado'){
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.date('Y-m-d').'" AND baixado = "0"'; 
							}
							else{
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'" AND baixado = "1"';
							}
						}
					}	
				}
			}
		}
		

		if($periodo == 'anterior'){
					$ano = $this->getLastYear();
					if(! isset($situacao) || $situacao == 'todos'){
				
						$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'"';

					}
					else{
						if($situacao == 'previsto'){
							$where = 'data_vencimento BETWEEN "'.date('Y-m-d').'" AND "'.$ano[1].'" AND baixado = "0"'; 
						}
						else{
							if($situacao == 'atrasado'){
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.date('Y-m-d').'" AND baixado = "0"'; 
							}
							else{
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'" AND baixado = "1"';
							}
						}
					}	
				}


		if($periodo == 'proximo'){
					$ano = $this->getNextYear();
					if(! isset($situacao) || $situacao == 'todos'){
				
						$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'"';

					}
					else{
						if($situacao == 'previsto'){
							$where = 'data_vencimento BETWEEN "'.date('Y-m-d').'" AND "'.$ano[1].'" AND baixado = "0"'; 
						}
						else{
							if($situacao == 'atrasado'){
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.date('Y-m-d').'" AND baixado = "0"'; 
							}
							else{
								$where = 'data_vencimento BETWEEN "'.$ano[0].'" AND "'.$ano[1].'" AND baixado = "1"';
							}
						}
					}	
				}


		$this->load->library('pagination');
        
        $config['base_url'] = base_url().'mensalidadesAcademia/mensalidadesAcademia';
        $config['total_rows'] = $this->lancamentosacademia_model->count('lancamentos_academia');
        $config['per_page'] = 10000;
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
        $this->pagination->initialize($config); 	

		$this->data['results'] = $this->lancamentosacademia_model->get('lancamentos_academia','idLancamentosAcademia,descricao,valor,data_vencimento,baixado,alunoResponsavel,tipo,forma_pgto,plano,idPlanos,alunos_id',$where,$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'mensalidadesAcademia/mensalidadesAcademia';
       	$this->load->view('tema/topo',$this->data);
	}


	function adicionarReceita() {
		
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');
        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {


            $vencimento = $this->input->post('vencimento');

            try {
                
                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2].'-'.$vencimento[1].'-'.$vencimento[0];
            } catch (Exception $e) {
               $vencimento = date('Y/m/d'); 
            }

            $data = array(
                'descricao' => set_value('descricao'),
				'valor' => set_value('valor'),
				'data_vencimento' => $vencimento,
				'baixado' => $this->input->post('recebido'),
				'alunoResponsavel' => set_value('alunoPagamento'),
				'forma_pgto' => $this->input->post('formaPgto'),
				'tipo' => set_value('tipo'),
				'alunos_id' => $this->input->post('alunos_idPagamento')
            );

            if ($this->lancamentosacademia_model->add('lancamentos_academia',$data) == TRUE) {
                $this->session->set_flashdata('success','Receita adicionada com sucesso!');
                redirect(base_url() . 'index.php/mensalidadesAcademia/mensalidadesAcademia/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->session->set_flashdata('error','Ocorreu um erro ao tentar adicionar receita.');
        redirect(base_url() . 'index.php/mensalidadesAcademia/mensalidadesAcademia/');
        
    }


    function adicionarDespesa() {
    	
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');
        if ($this->form_validation->run('despesa') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $vencimento = $this->input->post('vencimento');

            try {
                
                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2].'-'.$vencimento[1].'-'.$vencimento[0];

            } catch (Exception $e) {
               $vencimento = date('Y/m/d'); 
            }

            $data = array(
                'descricao' => set_value('descricao'),
				'valor' => set_value('valor'),
				'data_vencimento' => $vencimento,
				'baixado' => $this->input->post('pago'),
				'alunoResponsavel' => set_value('alunoDesconto'),
				'forma_pgto' => $this->input->post('formaPgto'),
				'tipo' => set_value('tipo'),
				'alunos_id' => $this->input->post('alunos_idDesconto')
            );

            if ($this->lancamentosacademia_model->add('lancamentos_academia',$data) == TRUE) {
                $this->session->set_flashdata('success','Despesa adicionada com sucesso!');
                redirect(base_url() . 'index.php/mensalidadesAcademia/mensalidadesAcademia/');
            } else {
                $this->session->set_flashdata('error','Ocorreu um erro ao tentar adicionar despesa!');
                redirect(base_url() . 'index.php/mensalidadesAcademia/mensalidadesAcademia/');
            }
        }

        $this->session->set_flashdata('error','Ocorreu um erro ao tentar adicionar despesa.');
        redirect(base_url() . 'index.php/mensalidadesAcademia/mensalidadesAcademia/');
        
        
    }


    public function editar(){
    	
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');

        $this->form_validation->set_rules('descricao', '', 'required|trim|xss_clean');
        $this->form_validation->set_rules('valor', '', 'trim|xss_clean');
		$this->form_validation->set_rules('plano', '', 'trim|xss_clean');
		$this->form_validation->set_rules('alunoResponsavel', '', 'trim|xss_clean');
        $this->form_validation->set_rules('pagamento', '', 'trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $vencimento = $this->input->post('vencimento');

            try {
                
                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2].'-'.$vencimento[1].'-'.$vencimento[0];

            } catch (Exception $e) {
               $vencimento = date('Y/m/d'); 
            }

            $data = array(
                'descricao' => $this->input->post('descricao'),
                'valor' => $this->input->post('valor'),
                'data_vencimento' => $vencimento,
                'baixado' => $this->input->post('pago'),
				'idPlanos' => $this->input->post('idPlanos'),
				'plano' => $this->input->post('plano'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
				'alunoResponsavel' => set_value('alunoResponsavel'),
				'alunos_id' => $this->input->post('alunos_id'),
				'aparece_no_caixa' => $this->input->post('pago')
            );

            if ($this->lancamentosacademia_model->edit('lancamentos_academia',$data,'idLancamentosAcademia',$this->input->post('id')) == TRUE) {
                $this->session->set_flashdata('success','lançamento editado com sucesso!');

            } else {
                $this->session->set_flashdata('error','Ocorreu um erro ao tentar editar lançamento!');
				redirect(base_url() . 'index.php/planos/planos/');

            }
        }
		
		$this->session->set_flashdata('error','');
        redirect(base_url() . 'index.php/planos/planos/');

    }

    public function excluirLancamento()
    {
    	$id = $this->input->post('id');


    	if($id == null || ! is_numeric($id)){
    		$json = array('result'=>  false);
    		echo json_encode($json);
    	}
    	else{

    		$result = $this->lancamentosacademia_model->delete('lancamentos_academia','idLancamentosAcademia',$id); 
    		if($result){
    			$json = array('result'=>  true);
    			echo json_encode($json);
    		}
    		else{
    			$json = array('result'=>  false);
    			echo json_encode($json);
    		}
    		
    	}
    }




	protected function getThisYear() {
        $dias = date("z");
        $primeiro = date("Y-m-d", strtotime("-".($dias)." day"));
        $ultimo = date("Y-m-d", strtotime("+".( 364 - $dias)." day"));
        return array($primeiro,$ultimo);
    }

	protected function getLastYear() {
        $dias = date("z");
        $primeiro = date("Y-m-d", strtotime("-".( 365 + $dias)." day"));
        $ultimo = date("Y-m-d", strtotime("-".( 1 + $dias)." day"));
        return array($primeiro,$ultimo);
    }

	protected function getNextYear() {
        $dias = date("z");
        $primeiro = date("Y-m-d", strtotime("+".( 366 - $dias)." day"));
        $ultimo = date("Y-m-d", strtotime("+".( 730 - $dias)." day"));
        return array($primeiro,$ultimo);
    }

    protected function getThisWeek(){

        return array(date("Y/m/d", strtotime("last sunday", strtotime("now"))),date("Y/m/d", strtotime("next saturday", strtotime("now"))));
    }

    protected function getLastSevenDays() {

        return array(date("Y-m-d", strtotime("-7 day", strtotime("now"))), date("Y-m-d", strtotime("now")));
    }

    protected function getThisMonth(){

        $mes = date('m');
        $ano = date('Y'); 
        $qtdDiasMes = date('t');
        $inicia = $ano."-".$mes."-01";

        $ate = $ano."-".$mes."-".$qtdDiasMes;
        return array($inicia, $ate);
    }

}

