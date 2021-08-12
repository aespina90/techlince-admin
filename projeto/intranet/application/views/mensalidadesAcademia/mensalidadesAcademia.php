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
    	<div class="span6"> 
    		<label for="descricao">Descrição*</label>
			<select name="descricao" id="descricao" class="span12" value="descricao">
						<option value="Pagamento Integral">Pagamento Integral</option>
		    </select>
    	</div>
		</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="aluno">Aluno</label>
    			<input class="span12" id="alunoPagamento" type="text" name="alunoPagamento" value="" autocomplete="off" />
    			<input id="alunos_id" class="span12" type="hidden" name="alunos_id" value=""  />
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
    <button class="btn btn-success">Adicionar Pagamento</button>
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
    		<div class="span12" style="margin-left: 0"> 
    			<label for="alunoDesconto">Aluno</label>
    			<input class="span12" id="alunoDesconto" type="text" name="alunoDesconto" value="" autocomplete="off" />
    			<input id="alunos_idDesconto" class="span12" type="hidden" name="alunos_idDesconto" value=""  />
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
<script type="text/javascript">
$(document).ready(function(){
	$(".money").maskMoney();


   $(document).on('click', 'a', function(event) {
        
        var os = $(this).attr('os');
        $('#idOs').val(os);

    });
    
	$("#aluno").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteAluno",
            minLength: 2,
            select: function( event, ui ) {

                 $("#alunos_id").val(ui.item.id);
                 $("#plano").focus();
            }
      })
	  $("#alunoPagamento").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteAluno",
            minLength: 2,
            select: function( event, ui ) {

                 $("#alunos_idPagamento").val(ui.item.id);
                 $("#plano").focus();
            }
      })
	  $("#alunoDesconto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteAluno",
            minLength: 2,
            select: function( event, ui ) {

                 $("#alunos_idDesconto").val(ui.item.id);
                 $("#plano").focus();
            }
      })
      
      
	  $("#plano").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompletePlano",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idPlano").val(ui.item.id);
            }
      });
	  $("#planoPagamento").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompletePlano",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idPlanoPagamento").val(ui.item.id);
            }
      });
	  $("#planoDesconto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompletePlano",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idPlanoDesconto").val(ui.item.id);
            }
      });


	   $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

});

</script>