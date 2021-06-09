<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Pagamentos</a></li>
          
        </ul>
    </div>
    <div class="widget-content tab-content">


        <!--Tab 1-->
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
			 <?php

			if(!$transacoes){?>
				<div class="widget-box">
			     <div class="widget-title">
			        <span class="icon">
			            <i class="icon-tags"></i>
			         </span>
			        <h5>Lançamentos Financeiros da Equipe</h5>

			     </div>

			<div class="widget-content nopadding">


			<table class="table table-bordered ">
			    <thead>
			        <tr style="backgroud-color: #2D335B">
			            <th>#</th>
			            <th>Tipo</th>
			            <th>Equipe</th>
			            <th>Descrição</th>
			            <th>Vencimento</th>
			            <th>Status</th>
			            <th>Valor</th>
			            <th></th>
			        </tr>
			    </thead>
			    <tbody>

			        <tr>
			            <td colspan="8">Nenhum lançamento encontrado</td>
			        </tr>
			    </tbody>
			</table>
			</div>
			</div>
			<?php } else{?>


			<div class="widget-box">
			     <div class="widget-title">
			        <span class="icon">
			            <i class="icon-tags"></i>
			         </span>
			        <h5>Lançamentos Financeiros da Equipe</h5>

			     </div>

			<div class="widget-content nopadding">


			<table class="table table-bordered " id="divLancamentos">
			    <thead>
			        <tr style="backgroud-color: #2D335B">
			            <th>#</th>
			            <th>Tipo</th>
			            <th>Equipe</th>
			            <th width="20%">Descrição</th>
			            <th>Vencimento</th>
			            <th>Status</th>
			            <th>Valor</th>
			            <th></th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php 
			        $totalReceita = 0;
			        $totalDespesa = 0;
			        $saldo = 0;
			        foreach ($transacoes as $r) {
			            $vencimento = date(('d/m/Y'),strtotime($r->data_vencimento));
			            if($r->baixado == 0){$status = 'Pendente';}else{ $status = 'Pago';};
			            if($r->tipo == 'receita'){ $label = 'success'; $totalReceita += $r->valor;} else{$label = 'important'; $totalDespesa += $r->valor;}
			            echo '<tr>'; 
			            echo '<td>'.$r->idLancamentosQuadra.'</td>';
			            echo '<td><span class="label label-'.$label.'">'.ucfirst($r->tipo).'</span></td>';
			            echo '<td>'.$r->servico.'</td>';
			            echo '<td>'.$r->descricao.'</td>';
			            echo '<td>'.$vencimento.'</td>';   
			            echo '<td>'.$status.'</td>';
			            echo '<td> R$ '.number_format($r->valor,2,',','.').'</td>';
			            
			            echo '<td>
			                      <a href="#modalEditar" data-toggle="modal" role="button" idLancamentosQuadra="'.$r->idLancamentosQuadra.'" descricao="'.$r->descricao.'" clienteResponsavel="'.$r->clienteResponsavel.'" clientes_id="'.$r->clientes_id.'" servico="'.$r->servico.'" idServicos="'.$r->idServicos.'" valor="'.$r->valor.'" vencimento="'.date('d/m/Y',strtotime($r->data_vencimento)).'" baixado="'.$r->baixado.'" formaPgto="'.$r->forma_pgto.'" tipo="'.$r->tipo.'" class="btn btn-info tip-top editar" title="Editar Lançamento"><i class="icon-pencil icon-white"></i></a>
			                      <a href="#modalExcluir" data-toggle="modal" role="button" idLancamentosQuadra="'.$r->idLancamentosQuadra.'" class="btn btn-danger tip-top excluir" title="Excluir Lançamento"><i class="icon-remove icon-white"></i></a>
			                  </td>';
			            echo '</tr>';
			        }?>
			        <tr>
			            
			        </tr>
			    </tbody>
			    <tfoot>
			    	<tr>
			    		<td colspan="6" style="text-align: right; color: green"> <strong>Total:</strong></td>
			    		<td colspan="2" style="text-align: left; color: green"><strong>R$ <?php echo number_format($totalReceita,2,',','.') ?></strong></td>
			    	</tr>

			    </tfoot>
			</table>
			</div>
			</div>
		
		<?php } ?>
		</div>        
        
    </div>
</div>


<!-- Modal editar lançamento -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formEditar" action="<?php echo base_url() ?>index.php/lancamentosquadra/editar" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Editar Lançamento</h3>
  </div>
  <div class="modal-body">
      <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
      <div class="span12" style="margin-left: 0"> 
    		<label for="descricao">Descrição</label>
			<select name="descricao" id="descricao" class="span12" value="descricao">
						<option value="Pagamento Integral">Pagamento Integral</option>
		    			<option value="Pagamento Parcial">Pagamento Parcial</option>			
		    			<option value="Crédito">Crédito</option>		
		    </select>
    	</div>
        <div class="span12" style="margin-left: 0">
            <label for="">Equipe</label>
            <input type="hidden" name="idServicos" id="idServicos"/>
            <input type="text" class="span12" name="servico" id="servico" />
			
    	</div>
        <div class="span12" style="margin-left: 0">
            <label for="">Cliente Responsável</label>
            <input type="hidden" name="clientes_id" id="clientes_id"/>
            <input type="text" class="span12" name="clienteResponsavel" id="clienteResponsavel" />
			
    	</div>
      <div class="span12" style="margin-left: 0"> 
        
      </div>
      <div class="span12" style="margin-left: 0"> 
        <div class="span4" style="margin-left: 0">  
          <label for="valor">Valor*</label>
          <input type="hidden"  name="tipo" value="despesa" />  
          <input type="hidden"  id="idEditar" name="id" value="" /> 
          <input class="span12 money"  type="text" name="valor" id="valorEditar" />
        </div>
        <div class="span4" >
          <label for="vencimento">Data Vencimento*</label>
          <input class="span12 datepicker"  type="text" name="vencimento" id="vencimentoEditar"  />
        </div>
        <div class="span4">
          <label for="vencimento">Tipo*</label>
          <select class="span12" name="tipo" id="tipoEditar">
            <option value="receita">Receita</option>
            <option value="despesa">Despesa</option>
          </select>
        </div>
        
      </div>
      <div class="span12" style="margin-left: 0"> 
        <div class="span4" style="margin-left: 0">
          <label for="pago">Foi Pago?</label>
          &nbsp &nbsp &nbsp &nbsp<input  id="pagoEditar" type="checkbox" name="pago" value="1" /> 
        </div>
        <div id="divPagamentoEditar" class="span8" style=" display: none">

          <div class="span6">
            <label for="formaPgto">Forma Pgto</label>
            <select name="formaPgto" id="formaPgtoEditar"  class="span12">
              <option value="Dinheiro">Dinheiro</option>
              <option value="Cartão de Crédito">Cartão de Crédito</option>
              <option value="Débito">Débito</option>        
            </select>
          </div>
        </div>
        
      </div>

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelarEditar">Cancelar</button>
    <button class="btn btn-primary">Salvar Alterações</button>
  </div>
  </form>
</div>



<!-- Modal Excluir lançamento-->
<div id="modalExcluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Excluir Lançamento</h3>
  </div>
  <div class="modal-body">
    <h5 style="text-align: center">Deseja realmente excluir esse lançamento?</h5>
    <input name="id" id="idExcluir" type="hidden" value="" />
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
    <button class="btn btn-danger" id="btnExcluir">Excluir Lançamento</button>
  </div>
</div>


<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>

<script type="text/javascript">
	function mostrarValor() {
		if (document.getElementById('valor').value == "" || document.getElementById('desconto').value == ""){
			
		}else{
			var valor = parseFloat(document.getElementById('valor').value);
			var desconto = parseInt(document.getElementById('desconto').value); 
			var resultado, total;
			resultado = valor/100;
			total = valor-(desconto*resultado);
			
			document.getElementById('valor').value = total;
			}
	}
	jQuery(document).ready(function($) {

		$(".money").maskMoney();

		$('#pago').click(function(event) {
			document.getElementById('contapaga').readOnly = this.checked;
			var flag = $(this).is(':checked');
			if(flag == true){
				$('#divPagamento').show();
				$('#contapaga').val('<?php echo date("d/m/Y");?>');
			}
			else{
				$('#divPagamento').hide();
			}
		});

		
		$('#valor_parc, #qtdparcelas_parc, #formaPgto_parc, #entrada, #dia_pgto, #dia_base_pgto').click(function(event){
			valorParcelas();
		});
		
		$('#add_receita').mouseover(function(event){
			valorParcelas();
		});


    $('#pagoEditar').click(function(event) {
	  document.getElementById('vencimentoEditar').readOnly = this.checked;
      var flag = $(this).is(':checked');
      if(flag == true){
        $('#divPagamentoEditar').show();
        $('#vencimentoEditar').val('<?php echo date("d/m/Y");?>');
      }
      else{
        $('#divPagamentoEditar').hide();
      }
    });

    

    $(document).on('click', '.excluir', function(event) {
      $("#idExcluir").val($(this).attr('idLancamentosQuadra'));
    });


    $(document).on('click', '.editar', function(event) {
      $("#idEditar").val($(this).attr('idLancamentosQuadra'));
      $("#descricaoEditar").val($(this).attr('descricao'));
      $("#servico").val($(this).attr('servico'));
      $("#clienteResponsavel").val($(this).attr('clienteResponsavel'));
      $("#idServicos").val($(this).attr('idServicos'));
      $("#clientes_id").val($(this).attr('clientes_id'));
      $("#valorEditar").val($(this).attr('valor'));
      $("#vencimentoEditar").val($(this).attr('vencimento'));
      $("#pagamentoEditar").val($(this).attr('pagamento'));
      $("#formaPgtoEditar").val($(this).attr('formaPgto'));
      $("#tipoEditar").val($(this).attr('tipo'));
      $("#urlAtualEditar").val($(location).attr('href'));
      var baixado = $(this).attr('baixado');
      if(baixado == 1){
        $("#pagoEditar").attr('checked', true);
        $("#divPagamentoEditar").show();
      }
      else{
        $("#pagoEditar").attr('checked', false); 
        $("#divPagamentoEditar").hide();
      }
      

    });

    $(document).on('click', '#btnExcluir', function(event) {
        var id = $("#idExcluir").val();
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>index.php/lancamentosquadra/excluirLancamento",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
            if(data.result == true){
                $("#btnCancelExcluir").trigger('click');
                $("#divLancamentos").html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
                $("#divLancamentos").load( $(location).attr('href')+" #divLancamentos" );
                
            }
            else{
                $("#btnCancelExcluir").trigger('click');
                alert('Ocorreu um erro ao tentar excluir produto.');
            }
          }
        });
        return false;
    });
 
    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

	});

</script>