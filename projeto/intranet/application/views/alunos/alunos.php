<a href="<?php echo base_url();?>index.php/alunos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Novo Aluno</a>
<a href="<?php echo base_url();?>index.php/alunos/desativados" class="btn btn-link"> Alunos Desativados</a>

<a href="<?php echo base_url()?>index.php/relatorios/alunos" class="btn btn-success" style="float:right;">Relatório</a>

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
                        <th>Apelido</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Atualizações</th>
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
        <th>Apelido</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Atualizações</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td><b>'.$r->nomeAluno.'</b></td>';
            echo '<td><b>'.$r->apelido.'</b></td>';
            echo '<td>'.$r->email.'</td>';
            echo '<td><center>'.$r->telefone.'</center></td>';
            if ($r->update == 0){echo "<td><center>Não Receber</center></td>";}else{echo "<td><center>Receber</center></td>";}'</td>';
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

<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var aluno = $(this).attr('aluno');
        $('#idAluno').val(aluno);

    });

});

</script>
