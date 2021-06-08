<?php
if (isset($_POST['fecharCaixa'])) {
	// Recupera os dados dos campos
	
	$data = $_POST['data'];
    try {
          $data = explode('/', $data);
          $data = $data[2].'-'.$data[1].'-'.$data[0];

         } catch (Exception $e) {
          $data = date('Y/m/d'); 
    	}

	$caixanum = $_POST['caixanum'];
	$usuario = $_POST['usuario'];
	$hora = $_POST['hora'];
	$entrada = $_POST['entrada'];
	$saida = $_POST['saida'];
	$total = $_POST['total'];

		$sql = mysql_query("UPDATE caixa SET usuariofechamento = '".$usuario."', datafechamento = '".$data."', horafechamento = '".$hora."', entrada = '".$entrada."', saida = '".$saida."', total = '".$total."' WHERE id = $caixanum");
		$sql2 = mysql_query("UPDATE status_caixa SET status = '0'");
		$sql3 = mysql_query("UPDATE lancamentos SET aparece_no_caixa = '0'");
		if ($sql && $sql2){$this->session->set_flashdata('success',"Caixa número $caixanum fechado com sucesso!");
		redirect('');
		}
}
?>

<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/dist/excanvas.min.js"></script><![endif]-->

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/dist/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/dist/jquery.jqplot.min.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dist/plugins/jqplot.donutRenderer.min.js"></script>


<!--End-Action boxes-->
<div class="row-fluid" style="margin-top: 0">
<div class="span12" style="margin-left: 0;">
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-money"></i>
         </span>
        <h5>Pagamentos pendentes para esta semana</h5>

     </div>

<div class="widget-content nopadding">

<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Tipo</th>
            <th>Fornecedor</th>
            <th>Vencimento</th>
            <th>Status</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
       <?php
			$totalReceita = '0';
			$totalDespesa = '0';	       	

				$sabado = 6; //sabado = 6º dia = fim da semana.
				$dia_atual=date('w'); //pego o dia atual
				$dias_que_faltam_para_o_sabado = $sabado - $dia_atual;

				$inicio = strtotime("-$dia_atual days");
				$fim = strtotime("+$dias_que_faltam_para_o_sabado days");

				$primdiasemana = date('Y-m-d',$inicio); //data inicial
				$ultmodiasemana = date('Y-m-d',$fim); //data final

		$sql = mysql_query("SELECT * FROM lancamentos WHERE (data_vencimento BETWEEN '".$primdiasemana."' and '".$ultmodiasemana."') and baixado = 0 ORDER by data_vencimento ASC");
				$conta = mysql_num_rows($sql);
			    if($conta != 0){
		
		while ($ln = mysql_fetch_array($sql)){
			$tipo = $ln['tipo'];
			$valor = $ln['valor'];
			if($tipo == 'receita'){ $labeltipo = '<center><span class="label label-success">Receita</span></center>'; $totalReceita += $valor;} else{$labeltipo = '<center><span class="label label-important">Despesa</span></center>'; $totalDespesa += $valor;}

			$cliente_fornecedor = $ln['cliente_fornecedor'];
			$data_vencimento = date(('d/m/Y'),strtotime($ln['data_vencimento']));
			$status = "Pendente";

	               echo '<tr>';
	               echo '<td>'.$labeltipo.'</td>';
	               echo '<td>'.$cliente_fornecedor.'</td>';
	               echo '<td>'.$data_vencimento.'</td>';
	               echo '<td>'.$status.'</td>';
	               echo '<td> R$ '.$valor.'</td>';
	               echo '</tr>';

	       }}else{
					echo '<tr>';
					echo '<td colspan="5"> Não existem lançamentos para essa semana</td>';
					echo '</tr>';
		   }
       ?>

    </tbody>
</table>
</div>
</div>
</div>
</div>

<?php
	$caixa = mysql_query("SELECT * FROM caixa ORDER BY id DESC LIMIT 1");
	while($ln = mysql_fetch_array($caixa)){
	$id_caixa = $ln['id'];
?>
<!-- Modal Fechar Caixa -->
<div id="modalFecharCaixa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formFecharCaixa" action="" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Fechar Caixa</h3>
  </div>
  <div class="modal-body">

    	<div class="span12" style="margin-left: 0"> 
    		<label for="caixanum"><?php echo '<h4>Fechamento do Caixa Nº #'.$id_caixa.'</h4>' ?></label>
    		<input type="hidden" name="caixanum" value="<?php  echo $id_caixa ?>" />
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<label for="usuario">Usuário</label>
    		<input class="span12" type="text" name="usuario" value="<?php echo $usuario->nome?>" readonly/>
    	</div>
    	<div class="span6" style="margin-left: 0"> 
    		<label for="data">Data</label>
    		<input class="span12" type="text" name="data" value="<?php echo date('d/m/Y'); ?>" readonly/>
    	</div>
    	<div class="span6""> 
    		<label for="hora">Hora</label>
    		<input class="span12" type="text" name="hora" value="<?php echo date('h:i:s');?>" readonly/>
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span6" style="margin-left: 0"> 
    			<label for="entrada" style="color: green">Entradas</label>

			<?php
				$datahoje = date('Y-m-d');
				$totalreceitadia = mysql_query("SELECT SUM(valor) FROM lancamentos WHERE baixado = '1' and tipo = 'receita' and data_vencimento = '".$datahoje."' and aparece_no_caixa = '1'");
				while($ln = mysql_fetch_array($totalreceitadia)){
				$somareceitadia = $ln['SUM(valor)'];
				
				$totaldespesadia = mysql_query("SELECT SUM(valor) FROM lancamentos WHERE baixado = '1' and tipo = 'despesa' and data_vencimento = '".$datahoje."' and aparece_no_caixa = '1'");
				while($ln = mysql_fetch_array($totaldespesadia)){
				$somadespesadia = $ln['SUM(valor)'];
				
				
				$totalcaixa = $somareceitadia - $somadespesadia;
			?>
    			<input class="span12 money" id="entrada" type="text" name="entrada" readonly value="<?php echo $somareceitadia;?>"/>

    		</div>
    		<div class="span6"> 
    			<label for="saida" style="color: red">Saídas</label>
    			<input class="span12 money" id="saida" type="text" name="saida" readonly value="<?php echo $somadespesadia;?>"/>
    		</div>
    	</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span5" style="float: right;"> 
    			<label for="total">Total</label>
    			<input class="span12 money" id="total" type="text" name="total" readonly value="<?php echo $totalcaixa;?>"/>
    		</div>
    	</div>
			<?php }}?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" class="btn btn-success" name="fecharCaixa" value="Fechar Caixa" />
  </div>
  </form>
</div>
<?php }?>
 <script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script>
    $(document).ready(function(){
        $(".money").maskMoney();
    });
</script>