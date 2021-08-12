<a href="<?php echo base_url()?>index.php/planos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Cadastrar Novo Plano</a>

<a href="<?php echo base_url()?>index.php/relatorios/planos" class="btn btn-success" style="float:right;">Relatório</a>
<?php

if(!$results){?>

    <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Planos</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="5">Nenhum "PLANO" Cadastrada</td>
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
        <h5>Planos</h5>
        <input type='submit' value='Imprimir' class='botao' onClick='tabelaEquipes.focus();print();' style="float:right; margin-top: 5px; margin-right: 5px;" />
     </div>

<div class="widget-content nopadding">


<table class="table table-bordered" id="tabelaEquipes">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td><b>'.$r->nome.'</b></td>';
            echo '<td>'.$r->descricao.'</td>';
            echo '<td>'.number_format($r->preco,2,',','.').'</td>';
            echo '<td>
                      <a href="'.base_url().'index.php/planos/visualizar/'.$r->idPlanos.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>
                      <a href="'.base_url().'index.php/planos/editar/'.$r->idPlanos.'" class="btn btn-info tip-top" title="Editar Plano"><i class="icon-pencil icon-white"></i></a>
                      <a href="#modal-excluir" role="button" data-toggle="modal" plano="'.$r->idPlanos.'" class="btn btn-danger tip-top" title="Excluir Plano"><i class="icon-remove icon-white"></i></a>  
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
  <form action="<?php echo base_url() ?>index.php/planos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Plano</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idPlano" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este PLANO?</h5>
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
        
        var plano = $(this).attr('plano');
        $('#idPlano').val(plano);

    });

});

</script>