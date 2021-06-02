<a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Cliente</a>
<a href="<?php echo base_url();?>index.php/clientes/desativados" class="btn btn-link"><i class="icon-plus icon-white"></i> Clientes desativados</a>
<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Clientes</h5>

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
                        <td colspan="5">Nenhum "CLIENTE" Cadastrado</td>
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
        <h5>Clientes</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
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
            echo '<td><b>'.$r->nomeCliente.'</b></td>';
            echo '<td><b>'.$r->apelido.'</b></td>';
            echo '<td>'.$r->email.'</td>';
            echo '<td><center>'.$r->telefone.'</center></td>';
            if ($r->update == 0){echo "<td><center>Não Receber</center></td>";}else{echo "<td><center>Receber</center></td>";}'</td>';
            echo '<td>
            		<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>
                    
                    <a href="'.base_url().'index.php/clientes/editar/'.$r->idClientes.'" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>';
            if($r->idClientes == 1){
			}else{
				echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$r->idClientes.'" class="btn btn-danger tip-top" title="Excluir Cliente" style="margin-left:3px;"><i class="icon-remove icon-white"></i></a>';
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
  <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Desativar Cliente</h5>
  </div>
  <div class="modal-body">
    <span class="span12 alert alert-error" style="margin-left: 0"><b>Atenção:</b> Ao desativar o "CLIENTE", o mesmo não poderá ser adicionado em novas vendas ou orçamentos. Você pode visualizar e ativar novamente este cliente clicando na opção "<b>Clientes desativados</b>".</span>
    <input type="hidden" id="idCliente" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente desativar este cliente?</h5>
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
        
        var cliente = $(this).attr('cliente');
        $('#idCliente').val(cliente);

    });

});

</script>
