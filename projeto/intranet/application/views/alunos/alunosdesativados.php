<a href="<?php echo base_url();?>index.php/clientes/" class="btn btn-link"><i class="icon-plus icon-white"></i> Alunos ativos</a>
<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Alunos Desativados</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Atualizações</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Aluno Desativado</td>
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
        <h5>Alunos Desativados</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Atualizações</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idClientes.'</td>';
            echo '<td>'.$r->nomeCliente.'</td>';
            echo '<td><center>'.$r->telefone.'</center></td>';
            if ($r->update == 0){echo "<td><center>Não Receber</center></td>";}else{echo "<td><center>Receber</center></td>";}'</td>';
            echo '<td>
            		<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>
                    
                    <a href="'.base_url().'index.php/clientes/editar/'.$r->idClientes.'" class="btn btn-info tip-top" title="Editar Aluno"><i class="icon-pencil icon-white"></i></a>';
            if($r->idClientes == 1){
			}else{
				echo '<a href="#modal-ativar" role="button" data-toggle="modal" cliente="'.$r->idClientes.'" class="btn btn-success tip-top" title="Reativar Aluno" style="margin-left:3px;"><i class="icon-ok icon-white"></i></a>';
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
<div id="modal-ativar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/clientes/ativar" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Reativar Aluno</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idCliente" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente reativar este aluno?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-success">Reativar</button>
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
