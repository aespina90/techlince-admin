<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<a href="#modalPgtoAcademia" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Lançar Pagamento Academia"><i class="icon-plus icon-white"></i> Lançar Pagamento</a>

<a href="#modalDespesa" data-toggle="modal" role="button" class="btn btn-danger tip-bottom" title="Cadastrar nova despesa"><i class="icon-plus icon-white"></i> Lançar Desconto (Bônus)</a>
<a href="<?php echo base_url()?>index.php/relatorios/mensalidadesAcademia" class="btn btn-success" style="float:right;">Relatório</a>

<!-- Modal Novo Pagamento Academia -->
<div id="modalPgtoAcademia" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formReceita" action="<?php echo base_url() ?>index.php/lancamentosacademia/adicionarReceita" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar Pagamento Academia - Receita</h3>
  </div>
  <div class="modal-body">
  <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
  		<div class="span12" style="margin-left: 0">
            <label for="">Equipe</label>
            <input type="text" class="span12" name="servicoPagamento" id="servicoPagamento" placeholder="Digite o nome da EQUIPE" />
			<input type="hidden" name="idServicoPagamento" id="idServicoPagamento"/>
    	</div>

		<div class="span12" style="margin-left: 0">
    	<div class="span6"> 
    		<label for="descricao">Descrição*</label>
			<select name="descricao" id="descricao" class="span12" value="descricao">
						<option value="Pagamento Integral">Pagamento Integral</option>
		    			<option value="Pagamento Parcial">Pagamento Parcial</option>			
		    			<option value="Crédito">Crédito</option>		
		    </select>
    	</div>
<!--
		<div class="span6"> 
    		<label for="periodo">Período/Mês*</label>
			<select name="periodo" id="periodo" class="span12" value="periodo">
						<option value="janeiro">Janeiro</option>
		    			<option value="fevereiro">Fevereiro</option>			
		    			<option value="marco">Março</option>
						<option value="abril">Abril</option>
		    			<option value="maio">Maio</option>			
		    			<option value="junho">Junho</option>	
						<option value="julho">Julho</option>
		    			<option value="agosto">Agosto</option>			
		    			<option value="setembro">Setembro</option>	
						<option value="outubro">Outubro</option>
		    			<option value="novembro">Novembro</option>			
		    			<option value="dezembro">Dezembro</option>			
		    </select>
    	</div>-->
		</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Cliente</label>
    			<input class="span12" id="clientePagamento" type="text" name="clientePagamento" value="" autocomplete="off" />
    			<input id="clientes_idPagamento" class="span12" type="hidden" name="clientes_idPagamento" value=""  />
    		</div>
    	</div>

    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="valor">Valor*</label>
    			<input type="hidden" id="tipo" name="tipo" value="receita" />	
    			<input class="span12 money" id="valor" type="text" name="valor" autocomplete="off"/>
    		</div>
    	
	      <div class="span4">  
	        <label for="desconto">Desconto</label>
	        <input class="span6" id="desconto" type="text" name="desconto" value="" placeholder="em %" style="float: left;" autocomplete="off" />
	        <input class="btn btn-inverse" onclick="mostrarValor();" type="button" name="valor_desconto" value="Aplicar" placeholder="em %" style="float: left;margin-left:5px;" />
	      </div>
      
	    	<div class="span4">
	    		<label for="vencimento">Data Pgto*</label>
	    		<input class="span12 datepicker" id="vencimento" type="text" name="vencimento" autocomplete="off" />
	    	</div>
	    	
    	</div>
	
    	<div class="span12" style="margin-left: 0">
    	
    		<div class="span4" style="margin-left: 0">
		    		<label for="qtdparcelas">Qtd Parcelas</label>
		    		<select name="qtdparcelas" id="qtdparcelas" class="span12">
		    			<option value="0">Pagamento à vista</option>
		    			<option value="1">1x</option>			
		    			<option value="2">2x</option>			
		    			<option value="3">3x</option>			
		    			<option value="4">4x</option>			
		    			<option value="5">5x</option>			
		    			<option value="6">6x</option>			
		    			<option value="7">7x</option>			
		    			<option value="8">8x</option>			
		    			<option value="9">9x</option>			
		    			<option value="10">10x</option>			
		    			<option value="11">11x</option>			
		    			<option value="12">12x</option>			
		    		</select>
		    	<a href="#modalReceitaParcelada" id="abrirmodalreceitaparcelada" data-toggle="modal" style="display: none;" role="button"> </a>
		    
	    	</div>
			
    		<div class="span4">
    			
	    			<label for="recebido">Recebido?</label>
	    			<input  id="recebido" type="checkbox" name="recebido" value="1" />	
    		
    		</div>
    		<div id="divRecebimento" class="span4" style=" display: none">
	    		<div class="span12">
		    		<label for="formaPgto">Forma Pgto</label>
		    		<select name="formaPgto" id="formaPgto" class="span12">
		    			<option value="Dinheiro">Dinheiro</option>
		    			<option value="Cartão de Crédito">Cartão de Crédito</option>
		    			<option value="Débito">Débito</option>  			
		    		</select>
		    	</div>
	    	</div>
    		
    	</div>

  </div>
  <div class="modal-footer">
    <button id="cancelar_nova_receita" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-success">Adicionar Receita</button>
  </div>
  </form>
</div>

<!-- Modal nova despesa -->
<div id="modalDespesa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formDespesa" action="<?php echo base_url() ?>index.php/lancamentosacademia/adicionarDespesa" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar Despesa</h3>
  </div>
  <div class="modal-body">

  		<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
    	<div class="span12" style="margin-left: 0"> 
		<label for="descricao">Descrição*</label>
		<input type="text" class="span12" name="descricao" id="descricao" placeholder="Digite o nome da descrição." />
    	</div>

		<!--
		<div class="span12"> 
    		<label for="periodo">Período/Mês*</label>
			<select name="periodo" id="periodo" class="span12" value="periodo">
						<option value="janeiro">Janeiro</option>
		    			<option value="fevereiro">Fevereiro</option>			
		    			<option value="marco">Março</option>
						<option value="abril">Abril</option>
		    			<option value="maio">Maio</option>			
		    			<option value="junho">Junho</option>	
						<option value="julho">Julho</option>
		    			<option value="agosto">Agosto</option>			
		    			<option value="setembro">Setembro</option>	
						<option value="outubro">Outubro</option>
		    			<option value="novembro">Novembro</option>			
		    			<option value="dezembro">Dezembro</option>			
		    </select>
    	</div>
		-->

    	<div class="span12" style="margin-left: 0"> 
		<div class="span12" style="margin-left: 0">
            <label for="">Equipe</label>
            <input type="text" class="span12" name="servicoDesconto" id="servicoDesconto" placeholder="Digite o nome da EQUIPE" autocomplete="off" />
			<input type="hidden" name="idServicoDesconto" id="idServicoDesconto"/>
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Cliente</label>
    			<input class="span12" id="clienteDesconto" type="text" name="clienteDesconto" value="" autocomplete="off" />
    			<input id="clientes_idDesconto" class="span12" type="hidden" name="clientes_idDesconto" value=""  />
    		</div>
    	</div>
    		
    	</div>
		<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">
    			<label for="pago">Foi Pago?</label>
	    		&nbsp &nbsp &nbsp &nbsp<input  id="pago" type="checkbox" name="pago" value="1" />	
    		</div>
    		<div id="divPagamento" class="span8" style=" display: none">

	    		<div class="span6">
		    		<label for="formaPgto">Forma Pgto</label>
					<input type="text" class="span12" name="formaPgto" id="formaPgto" placeholder="" />
		    	</div>
	    	</div>
    		
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="valor">Valor*</label>
    			<input type="hidden"  name="tipo" value="despesa" />	
    			<input class="span12 money"  type="text" name="valor"  />
    		</div>
	    	<div class="span4" >
	    		<label for="vencimento">Data Vencimento*</label>
	    		<input class="span12 datepicker"  type="text" name="vencimento" id="contapaga" autocomplete="off" />
	    	</div>
	    	
    	</div>
    

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Adicionar Despesa</button>
  </div>
  </form>
</div>

<script src="<?php echo base_url();?>js/maskmoney.js"></script>