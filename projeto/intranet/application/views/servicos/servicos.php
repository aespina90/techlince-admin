<a href="<?php echo base_url()?>index.php/servicos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Cadastrar Nova Equipe</a>

<a href="<?php echo base_url()?>index.php/relatorios/servicos" class="btn btn-warning" style="float:right;">Relatórios</a>
<?php

if(!$results){?>

    <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Equipes</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Nome</th>
            <th>Cliente Responsável</th>
            <th>Valor</th>
            <th>Dia de Jogo</th>
            <th>Início da Partida</th>
            <th>Fim da Partida</th>
            <th>Quadra</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="5">Nenhuma "EQUIPE" Cadastrada</td>
        </tr>
    </tbody>
</table>
</div>
</div>



<?php }
else{ ?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Equipes</h5>
        <input type='submit' value='Imprimir' class='botao' onClick='tabelaEquipes.focus();print();' style="float:right; margin-top: 5px; margin-right: 5px;" />
     </div>

<div class="widget-content nopadding">


<table class="table table-bordered" id="tabelaEquipes">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Nome</th>
            <th>Cliente Responsável</th>
            <th>Valor</th>
            <th>Dia de Jogo</th>
            <th>Início da Partida</th>
            <th>Fim da Partida</th>
            <th>Quadra</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td><b>'.$r->nome.'</b></td>';
            echo '<td>'.$r->clienteResponsavel.'</td>';
            echo '<td>'.number_format($r->preco,2,',','.').'</td>';
            echo '<td>'.$r->diaJogo.'</td>';
            echo '<td>'.$r->inicioPartida.'</td>';
            echo '<td>'.$r->fimPartida.'</td>';
            echo '<td>'.$r->quadra.'</td>';
            echo '<td>
                      <a href="'.base_url().'index.php/servicos/visualizar/'.$r->idServicos.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>
                      <a href="'.base_url().'index.php/servicos/editar/'.$r->idServicos.'" class="btn btn-info tip-top" title="Editar Equipe"><i class="icon-pencil icon-white"></i></a>
                      <a href="#modal-excluir" role="button" data-toggle="modal" servico="'.$r->idServicos.'" class="btn btn-danger tip-top" title="Excluir Equipe"><i class="icon-remove icon-white"></i></a>  
                  </td>';
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
  <form action="<?php echo base_url() ?>index.php/servicos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Equipe</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idServico" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir esta EQUIPE?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var servico = $(this).attr('servico');
        $('#idServico').val(servico);

    });

});

</script>