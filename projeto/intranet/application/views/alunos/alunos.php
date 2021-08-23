<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<!--<a href="<?php echo base_url();?>index.php/alunos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Novo Aluno</a>-->

<a href="#modalPgtoAcademia" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Lançar Pagamento Academia"><i class="icon-plus icon-white"></i> Lançar Pagamento</a>
<a href="<?php echo base_url();?>index.php/alunos/desativados" class="btn btn-link"> Alunos Desativados</a>

<a href="<?php echo base_url()?>index.php/relatorios/alunos" class="btn btn-success" style="float:right;">Relatório</a>

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
						<option value="Pagamento Integral">Pagamento Mensalidade Academia</option>
		    </select>
    	</div>
		</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="aluno">Aluno</label>
    			<input class="span12" id="alunoPagamento" type="text" name="alunoPagamento" value="" autocomplete="off" />
    			<input id="alunos_idPagamento" class="span12" type="hidden" name="alunos_idPagamento" value=""  />
    		</div>
    	</div>

    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="valor">Valor*</label>
    			<input type="hidden" id="tipo" name="tipo" value="receita" />	
    			<input class="span12 money" id="valor" type="text" name="valor" autocomplete="off"/>
    		</div>
    	
      
	    	<div class="span4">
	    		<label for="vencimento">Data Pgto*</label>
	    		<input class="span12 datepicker" id="vencimento" type="text" name="vencimento" autocomplete="off" />
	    	</div>
	    	
    	</div>

  </div>
  <div class="modal-footer">
    <button id="cancelar_nova_receita" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-success">Adicionar Pagamento</button>
  </div>
  </form>
</div>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Alunos</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                     
                        <th>E-mail</th>
                        <th>Telefone</th>
                      
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5"><strong>AGUARDE - Carregando tabelas de integração com a CATRACA.</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Alunos</h5>
        <input type='submit' value='Imprimir' class='botao' onClick='tabelaAlunos.focus();print();' style="float:right; margin-top: 5px; margin-right: 5px;" />
     </div>

<div class="widget-content nopadding">


<table class="table table-bordered" id="tabelaAlunos">
    <thead>
        <tr>
        <th>Nome</th>
       
        <th>E-mail</th>
        <th>Telefone</th>
      
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td><b>'.$r->nomeAluno.'</b></td>';
          
            echo '<td>'.$r->email.'</td>';
            echo '<td><center>'.$r->telefone.'</center></td>';
         
            echo '<td>
            		<a href="'.base_url().'index.php/alunos/visualizar/'.$r->idAlunos.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>
                    
                    <a href="'.base_url().'index.php/alunos/editar/'.$r->idAlunos.'" class="btn btn-info tip-top" title="Editar Aluno"><i class="icon-pencil icon-white"></i></a>';
            if($r->idAlunos == 1){
			}else{
				echo '<a href="#modal-excluir" role="button" data-toggle="modal" aluno="'.$r->idAlunos.'" class="btn btn-danger tip-top" title="Excluir Aluno" style="margin-left:3px;"><i class="icon-remove icon-white"></i></a>';
			}
            echo '</td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>

<?php echo $this->pagination->create_links();}?>
 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/alunos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Desativar Aluno</h5>
  </div>
  <div class="modal-body">
    <span class="span12 alert alert-error" style="margin-left: 0"><b>Atenção:</b> Ao desativar o "ALUNO", o mesmo não poderá ser adicionado em novas vendas ou orçamentos. Você pode visualizar e ativar novamente este aluno clicando na opção "<b>Alunos desativados</b>".</span>
    <input type="hidden" id="idAluno" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente desativar este aluno?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Desativar</button>
  </div>
  </form>
</div>

<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".money").maskMoney();




    $(document).on('click', 'a', function(event) {
     
     var aluno = $(this).attr('aluno');
     $('#idAluno').val(aluno);

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
