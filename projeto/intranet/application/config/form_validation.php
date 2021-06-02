<?php
$config = array('clientes' => array(array(
                                	'field'=>'nomeCliente',
                                	'label'=>'Nome',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'documento',
                                	'label'=>'CPF/CNPJ',
                                	'rules'=>'trim|xss_clean'
                                ),
                                array(
                                	'field'=>'apelido',
                                	'label'=>'Apelido',
                                	'rules'=>'trim|xss_clean'
                                ),
                                array(
                                	'field'=>'rg',
                                	'label'=>'RG',
                                	'rules'=>'trim|xss_clean'
                                ),
                                array(
                                	'field'=>'cpf',
                                	'label'=>'CPF',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefone',
                                	'label'=>'Telefone',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'email',
                                	'label'=>'Email',
                                	'rules'=>'trim|valid_email|xss_clean'
                                ),
								array(
                                	'field'=>'rua',
                                	'label'=>'Rua',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'numero',
                                	'label'=>'Número',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'bairro',
                                	'label'=>'Bairro',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cidade',
                                	'label'=>'Cidade',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'estado',
                                	'label'=>'Estado',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cep',
                                	'label'=>'CEP',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'update',
                                	'label'=>'Update',
                                	'rules'=>'trim|xss_clean'
                                ))
                ,
                'servicos' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descricao',
                                    'label'=>'',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'clienteResponsavel',
                                    'label'=>'Cliente Responsável',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'diaJogo',
                                    'label'=>'Dia de Jogo',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'inicioPartida',
                                    'label'=>'Início da Partida',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'fimPartida',
                                    'label'=>'Fim da Partida',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'quadra',
                                    'label'=>'Quadra',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'preco',
                                    'label'=>'',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'produtos' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'unidade',
                                    'label'=>'Unidade',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'precoCompra',
                                    'label'=>'Preço de Compra',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'precoVenda',
                                    'label'=>'Preço de Venda',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'estoque',
                                    'label'=>'Estoque',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'estoqueMinimo',
                                    'label'=>'Estoque Mínimo',
                                    'rules'=>'trim|xss_clean'
                                ))
                ,
                'acompanhamento' => array(array(
                                    'field'=>'obj_prazo',
                                    'label'=>'Prazo',
                                    'rules'=>'trim|xss_clean'
                                ))
                ,
                'adicionaracompanhamento' => array(array(
                                    'field'=>'cliente',
                                    'label'=>'Cliente',
                                    'rules'=>'required|trim|xss_clean'
                                ))             
                ,
                'adicionaravaliacao' => array(array(
                                    'field'=>'instrutor',
                                    'label'=>'instrutor',
                                    'rules'=>'required|trim|xss_clean'
                                ))             
                ,
                'usuarios' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'rg',
                                    'label'=>'RG',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'cpf',
                                    'label'=>'CPF',
                                    'rules'=>'required|trim|xss_clean|is_unique[usuarios.cpf]'
                                ),
                                array(
                                    'field'=>'rua',
                                    'label'=>'Rua',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'numero',
                                    'label'=>'Numero',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'bairro',
                                    'label'=>'Bairro',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'cidade',
                                    'label'=>'Cidade',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'estado',
                                    'label'=>'Estado',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean|is_unique[usuarios.email]'
                                ),
                                array(
                                    'field'=>'senha',
                                    'label'=>'Senha',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'telefone',
                                    'label'=>'Telefone',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'situacao',
                                    'label'=>'Situacao',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,      
                'os' => array(array(
                                    'field'=>'dataInicial',
                                    'label'=>'DataInicial',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dataFinal',
                                    'label'=>'DataFinal',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'status',
                                    'label'=>'Status',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'observacoes',
                                    'label'=>'Observacoes',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'clientes_id',
                                    'label'=>'clientes',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'usuarios_id',
                                    'label'=>'usuarios_id',
                                    'rules'=>'trim|xss_clean|required'
                                ))

                  ,
				'tiposUsuario' => array(array(
                                	'field'=>'nomeTipo',
                                	'label'=>'NomeTipo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'situacao',
                                	'label'=>'Situacao',
                                	'rules'=>'required|trim|xss_clean'
                                ))

                ,
                'receita' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                        
                                array(
                                    'field'=>'cliente',
                                    'label'=>'Cliente',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'servico',
                                    'label'=>'Equipe',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'receita_parc' => array(array(
                                    'field'=>'descricao_parc',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor_parc',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'cliente_parc',
                                    'label'=>'Cliente',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                
                                array(
                                    'field'=>'entrada',
                                    'label'=>'Entrada',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dia_pgto',
                                    'label'=>'Dia da Entrada',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dia_base_pgto',
                                    'label'=>'Data Base de Pagamento',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valorparcelas',
                                    'label'=>'Parcelas',
                                    'rules'=>'required|trim|xss_clean'
                                )
                                )
                ,
                'despesa' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'fornecedor',
                                    'label'=>'Fornecedor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'vendas' => array(array(

                                    'field' => 'dataVenda',
                                    'label' => 'Data da Venda',
                                    'rules' => 'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'clientes_id',
                                    'label'=>'clientes',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'usuarios_id',
                                    'label'=>'usuarios_id',
                                    'rules'=>'trim|xss_clean|required'
                                ))
		);
			   