<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<a href="#modalAddNovo" data-toggle="modal" class="btn btn-success"><i class="icon-plus icon-white"></i> Adcionar Novo</a>
<a href="#modalPgtoQuadra" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Lançar Pagamento Quadra"><i class="icon-plus icon-white"></i> Lançar Pagamento</a>

<a href="#modalDespesa" data-toggle="modal" role="button" class="btn btn-danger tip-bottom" title="Cadastrar nova despesa"><i class="icon-plus icon-white"></i> Lançar Desconto (Bônus)</a>
<a href="<?php echo base_url()?>index.php/relatorios/mensalidades" class="btn btn-success" style="float:right;">Relatório</a>

<!-- <?php if($this->session->userdata('nivel') == 1){?>
<a href="<?php echo base_url()?>index.php/mensalidades/mensalidadesPagas" class="btn btn-link"><i class="icon-money icon-white"></i> Mensalidades Pagas</a>
<?php }?> -->

<!-- <a href="<?php echo base_url();?>index.php/servicos" class="btn btn-success" style="float:right;"><i class="icon-plus icon-white"></i> Equipe</a> -->

<?php
if (isset($_POST['selecionarano'])) {
	// Recupera os dados dos campos
	$selecionarano = $_POST['selecionarano'];

		$sql = mysql_query("UPDATE anoselecionado SET anoselecionado = '".$selecionarano."'");
		if ($sql){$this->session->set_flashdata('success',"Exibindo mensalidades do ano $selecionarano");
		redirect('mensalidades');
		}
}

if (isset($_POST['importar'])) {
	// Recupera os dados dos campos
	$anoanterior = $_POST['anoanterior'];
	$anoselecionado = $_POST['anoselecionado'];

		$sql = mysql_query("INSERT INTO mensalidades (clientes_id, data_pagamento, servico_id) SELECT `clientes_id`, `data_pagamento`, `servico_id` FROM `mensalidades` WHERE ano = '".$anoanterior."'");
		$sql2 = mysql_query("UPDATE mensalidades SET ano = '".$anoselecionado."' WHERE ano =''");
		if ($sql && $sql2){$this->session->set_flashdata('success',"Mensalidades de $anoanterior importadas com sucesso!");
		redirect('mensalidades');
		}
}

if(isset($_POST['addnovo'])) {
	// Recupera os dados dos campos
	$clientes_id = $_POST['clientes_id'];
	$cliente = $_POST['cliente'];
	$ano = $_POST['ano'];
	$vencimento = $_POST['vencimento'];
	$idServico = $_POST["idServico"];
	$servico = $_POST["servico"];

if($clientes_id == 0){
	$this->session->set_flashdata('error',"É necessário cadastrar o aluno <b>$cliente</b> para lançar as mensalidades. Acesse o menu <b>Alunos > Adicionar Aluno</b>");
	redirect('mensalidades');
}elseif($idServico == 0){
	$this->session->set_flashdata('error',"É necessário cadastrar o serviço <b>$servico</b> para lançar as mensalidades. Clique no botão <b>+Equipes</b>");
	redirect('mensalidades');
}else{
$dataatual = date('d/m/y');
	$partes = explode("/", $dataatual);
	$mesatual = $partes[1];
     
    $ultimomes = $mesatual - 1;

if ($mesatual == "1"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '0','0','0','0','0','0','0','0','0','0','0','0','0')");
}
if ($ultimomes == "1"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','0','0','0','0','0','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "2"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','0','0','0','0','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "3"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','0','0','0','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "4"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','0','0','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "5"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','0','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "6"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','0','0','0','0','0','0','0')");
}
elseif($ultimomes == "7"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','0','0','0','0','0','0')");
}
elseif($ultimomes == "8"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','3','0','0','0','0','0')");
}
elseif($ultimomes == "9"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','3','3','0','0','0','0')");
}
elseif($ultimomes == "10"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','3','3',3','0','0','0')");
}
elseif($ultimomes == "11"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','3','3','3','3','0','0')");
}
elseif($mesatual == "12"){
	$sql = mysql_query("INSERT INTO mensalidades VALUES ('', '".$clientes_id."', '".$ano."', '".$vencimento."', '".$idServico."', '3','3','3','3','3','3','3','3','3','3','3','0','0')");
}

if ($sql){$this->session->set_flashdata('success',"Mensalidades de <b>$cliente</b> lançadas com sucesso!");
	redirect('mensalidades');}
}
}

if (isset($_POST['pagar'])) {

	$emitente = mysql_query("SELECT nome FROM emitente ORDER BY id ASC LIMIT 1");
	while($ln = mysql_fetch_array($emitente)){
	$nome_emitente = $ln['nome'];
}
	$data_atual = date('Y/m/d');
	// Recupera os dados dos campos
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$valor = $_POST['valor'];
	$aluno = $_POST['aluno'];
		$partes = explode(' ', $aluno);
		$primeiroNome = array_shift($partes);
		$ultimoNome = array_pop($partes);

		$sql = mysql_query("UPDATE `mensalidades` SET `".$mes."` = '1' WHERE id = '".$id."'");
		$sql2 = mysql_query("UPDATE `mensalidades` SET totalpago = totalpago+'".$valor."' WHERE id = '".$id."'");
		$sql3 = mysql_query("UPDATE `total_pago_mes` SET `".$mes."` = $mes+'".$valor."' WHERE ano = '".$ano."'");
		
		if ($sql && $sql2 && $sql3 && $sql4){$this->session->set_flashdata('success','Mensalidade lançada com sucesso!');
		redirect('mensalidades');
		}
}

if (isset($_POST['estornar'])) {
	// Recupera os dados dos campos
	$id = $_POST['id'];
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$valor = $_POST['valor'];
	$aluno = $_POST['aluno'];
		$partes = explode(' ', $aluno);
		$primeiroNome = array_shift($partes);
		$ultimoNome = array_pop($partes);

		$sql = mysql_query("UPDATE `mensalidades` SET `".$mes."` = '0' WHERE id = '".$id."'");
		$sql2 = mysql_query("UPDATE `mensalidades` SET totalpago = totalpago-'".$valor."' WHERE id = '".$id."'");
		$sql3 = mysql_query("UPDATE `total_pago_mes` SET `".$mes."` = $mes-'".$valor."' WHERE ano = '".$ano."'");
		$sql4 = mysql_query("DELETE FROM `lancamentos` WHERE descricao = 'Mens. $primeiroNome $ultimoNome <strong>[id $id]</strong>'");
		if ($sql && $sql2 && $sql3 && $sql4){$this->session->set_flashdata('error','Mensalidade estornada com sucesso!');
		redirect('mensalidades');
		}
}

$dataatual = date('d/m/y');
	$partes = explode("/", $dataatual);
	$diaatual = $partes[0];
	$mesatual = $partes[1];
	$anoatual = "20".$partes[2];
     
    $ultimomes = $mesatual - 1;

if ($ultimomes == "1"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	}

if ($ultimomes == "2"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	}

if ($ultimomes == "3"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	}

if ($ultimomes == "4"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	}
	
if ($ultimomes == "5"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	}
	
if ($ultimomes == "6"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	}
	
if ($ultimomes == "7"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	}
	
if ($ultimomes == "8"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysql_query("UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	}
	
if ($ultimomes == "9"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysql_query("UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysql_query("UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	}
	
if ($ultimomes == "10"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysql_query("UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysql_query("UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysql_query("UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	}
	
if ($ultimomes == "11"){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysql_query("UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysql_query("UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysql_query("UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	$sql = mysql_query("UPDATE mensalidades SET nov = '2' WHERE nov = '0'");
	}
	
if ($mesatual == "12" &&  $diaatual >= 21  ){
	$sql = mysql_query("UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysql_query("UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysql_query("UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysql_query("UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysql_query("UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysql_query("UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysql_query("UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysql_query("UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	$sql = mysql_query("UPDATE mensalidades SET nov = '2' WHERE nov = '0'");
	$sql = mysql_query("UPDATE mensalidades SET dez = '2' WHERE dez = '0'");
	}
?>

<div class="row-fluid" style="margin-top: 0">

    <div class="span12">
        
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>ESTATÍSTICAS</h5>
			<input type='submit' value='Imprimir' class='botao' onClick='window.print()' style="float:right; margin-top: 5px; margin-right: 5px;" />
			</div>
            <div class="widget-content">
                <div class="row-fluid">           
                    <div class="span12">
                        <ul class="site-stats">
                            <li class="bg_lh"><i class="icon-user"></i> <strong><?php echo $this->db->count_all('clientes');?></strong> <small>CLIENTES (QUADRA)</small></li>
							<li class="bg_lh"><i class="icon-group"></i> <strong><?php echo $this->db->count_all('servicos');?></strong> <small>EQUIPES</small></li>
                            <!--<li class="bg_lh"><i class="icon-barcode"></i> <strong><?php echo $this->db->count_all('produtos');?></strong> <small>PRODUTOS CADASTRADOS</small></li>-->
                            <!--<li class="bg_lh"><i class="icon-shopping-cart"></i> <strong><?php echo $this->db->count_all('vendas');?></strong> <small>VENDAS</small></li> -->
                            <!--<li class="bg_lh"><i class="icon-wrench"></i> <strong><?php echo $this->db->count_all('lancamentos');?></strong> <small>Transações</small></li>-->
                        </ul>
                 
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>MENSALIDADES POR EQUIPE</h5>
  
        <div id="search" style="right:100px;top:2px;">
  <form action="<?php echo base_url()?>index.php/mapos/pesquisarAluno">
    <input type="text" name="termo" placeholder="Nome ou código" style="width: 120px;background: #fff;border: 1px solid #ddd;color: #444;"/>
    <button type="submit"  class="tip-bottom" title="Pesquisar" style="border: 1px solid #ddd;background:#999;"><i class="icon-search icon-white"></i></button>
    
  </form>
</div>
        
        
	<form action="" method="post" enctype="multipart/form-data">
			<select name="selecionarano" onchange="this.form.submit()" style="width: 80px;float: right;margin: 3px 5px 0 0;">
				<?php
					$seleciona = mysql_query("SELECT anoselecionado FROM anoselecionado LIMIT 1");
					while($ln = mysql_fetch_array($seleciona)){
					$anoselecionado = $ln['anoselecionado'];
					?>
					<option><?php echo $anoselecionado; ?></option>
				<?php ;} ?>
					<option disabled="">-------</option>
					<option>2021</option>
			</select>
	</form> 
     </div>
     
<div class="widget-content nopadding">
    	<?php
			$seleciona = mysql_query("SELECT anoselecionado FROM anoselecionado LIMIT 1");
			while($ln = mysql_fetch_array($seleciona)){
			$anoselecionado = $ln['anoselecionado'];
		} ?>

<?php
	$seleciona = mysql_query("SELECT * FROM mensalidades WHERE ano = ".$anoselecionado." ORDER by id ASC");
		$conta = mysql_num_rows($seleciona);
			    if($conta <= 0){
			    	echo "<center><div><h3>Ainda não existem cobranças para o ano $anoselecionado</h3></div></center>";

			    	$anoanterior = $anoselecionado -1;
					$sel_apenas_ano_anterior = mysql_query("SELECT ano FROM mensalidades WHERE ano = ".$anoanterior."");
					$conta_ano = mysql_num_rows($sel_apenas_ano_anterior);
						if($anoselecionado == $anoatual){
							    if($conta_ano <= 0){
										echo"					
										<script type='text/javascript'>
											$(document).ready(function(){
												$('#modalimportar_vazio').click();
										});
										</script>
										";
							    }else{echo"					
										<script type='text/javascript'>
											$(document).ready(function(){
												$('#modalimportar').click();
										});
										</script>
										";
							}
							}
					}else{
					echo "
					<table class='table table-bordered' id='tabela-mensalidades'>
						<thead>
							<tr style='backgroud-color: #2D335B'>
							
							    <th style='width: 200px'>Equipe</th>
							    <th>Ações</th>
								<th>Ano</th>
							    <th>Jan</th>
							    <th>Fev</th>
							    <th>Mar</th>
							    <th>Abr</th>
							    <th>Mai</th>
							    <th>Jun</th>
							    <th>Jul</th>
							    <th>Ago</th>
							    <th>Set</th>
							    <th>Out</th>
							    <th>Nov</th>
							    <th>Dez</th>
							</tr>
						</thead>
					";
			while($ln = mysql_fetch_array($seleciona)){
			$id = $ln['id'];
			$clientes_id = $ln['clientes_id'];
			$ano = $ln['ano'];
			$data_pagamento = $ln['data_pagamento'];
			$servico_id = $ln['servico_id'];
			$jan = $ln['jan'];
			$fev = $ln['fev'];
			$mar = $ln['mar'];
			$abr = $ln['abr'];
			$mai = $ln['mai'];
			$jun = $ln['jun'];
			$jul = $ln['jul'];
			$ago = $ln['ago'];
			$set = $ln['setembro'];
			$out = $ln['outubro'];
			$nov = $ln['nov'];
			$dez = $ln['dez'];
			
			if($jan == 0){$input_jan = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($jan == 1){$input_jan = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jan == 2){$input_jan = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jan == 3){$input_jan = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($fev == 0){$input_fev = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($fev == 1){$input_fev = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($fev == 2){$input_fev = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($fev == 3){$input_fev = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($mar == 0){$input_mar = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($mar == 1){$input_mar = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($mar == 2){$input_mar = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($mar == 3){$input_mar = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($abr == 0){$input_abr = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($abr == 1){$input_abr = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($abr == 2){$input_abr = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($abr == 3){$input_abr = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($mai == 0){$input_mai = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($mai == 1){$input_mai = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($mai == 2){$input_mai = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($mai == 3){$input_mai = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($jun == 0){$input_jun = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($jun == 1){$input_jun = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jun == 2){$input_jun = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jun == 3){$input_jun = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($jul == 0){$input_jul = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($jul == 1){$input_jul = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jul == 2){$input_jul = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jul == 3){$input_jul = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($ago == 0){$input_ago = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($ago == 1){$input_ago = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($ago == 2){$input_ago = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($ago == 3){$input_ago = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($set == 0){$input_set = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($set == 1){$input_set = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($set == 2){$input_set = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($set == 3){$input_set = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($out == 0){$input_out = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($out == 1){$input_out = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($out == 2){$input_out = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($out == 3){$input_out = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($nov == 0){$input_nov = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($nov == 1){$input_nov = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($nov == 2){$input_nov = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($nov == 3){$input_nov = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}

			if($dez == 0){$input_dez = "<center><input type='submit' class='mesnpago' name='pagar' value='Não Pago'/></center>";}
			if($dez == 1){$input_dez = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($dez == 2){$input_dez = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($dez == 3){$input_dez = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Aluno não era matriculado' /></center>";}
			
$corjan = "";
$corfev = "";
$cormar = "";
$corabr = "";
$cormai = "";
$corjun = "";
$corjul = "";
$corago = "";
$corset = "";
$corout = "";
$cornov = "";
$cordez = "";

if($mesatual == 1 and $data_pagamento <= $diaatual and $jan == 0){$corjan = 'style="background-color:#fff8bd;"';}
if($mesatual == 2 and $data_pagamento <= $diaatual and $fev == 0){$corfev = 'style="background-color:#fff8bd;"';}
if($mesatual == 3 and $data_pagamento <= $diaatual and $mar == 0){$cormar = 'style="background-color:#fff8bd;"';}
if($mesatual == 4 and $data_pagamento <= $diaatual and $abr == 0){$corabr = 'style="background-color:#fff8bd;"';}
if($mesatual == 5 and $data_pagamento <= $diaatual and $mai == 0){$cormai = 'style="background-color:#fff8bd;"';}
if($mesatual == 6 and $data_pagamento <= $diaatual and $jun == 0){$corjun = 'style="background-color:#fff8bd;"';}
if($mesatual == 7 and $data_pagamento <= $diaatual and $jul == 0){$corjul = 'style="background-color:#fff8bd;"';}
if($mesatual == 8 and $data_pagamento <= $diaatual and $ago == 0){$corago = 'style="background-color:#fff8bd;"';}
if($mesatual == 9 and $data_pagamento <= $diaatual and $set == 0){$corset = 'style="background-color:#fff8bd;"';}
if($mesatual == 10 and $data_pagamento <= $diaatual and $out == 0){$corout = 'style="background-color:#fff8bd;"';}
if($mesatual == 11 and $data_pagamento <= $diaatual and $nov == 0){$cornov = 'style="background-color:#fff8bd;"';}
if($mesatual == 12 and $data_pagamento < $diaatual and $dez == 0){$cordez = 'style="background-color:#fff8bd;"';}		
?>
    <tbody id="tabelaMensalidades">
        <tr>
           <!-- <td><?php echo $id; ?></td> -->

			<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT nome FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$nome = $ln['nome'];
					?>
			<td><b><?php echo $nome; ?></b></td>
		<?php }?>          

			<td><a href="#modalVer<?php echo $id;?>" data-toggle="modal"><div class="ver">Ações</div></a></td>
			<td><?php echo $ano; ?></td>
           
            <td <?php echo $corjan; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jan"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_jan; ?>
            	</form>
            </td>
           
            <td <?php echo $corfev; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>           			
           			<input type="hidden" name="mes" value="fev"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_fev; ?>
            	</form>
            </td>

            <td <?php echo $cormar; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="mar"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_mar; ?>
            	</form>
            </td>

            <td <?php echo $corabr; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="abr"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_abr; ?>
            	</form>
            </td>

            <td <?php echo $cormai; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="mai"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_mai; ?>
            	</form>
            </td>

            <td <?php echo $corjun; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jun"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_jun; ?>
            	</form>
            </td>

            <td <?php echo $corjul; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jul"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_jul; ?>
            	</form>
            </td>

            <td <?php echo $corago; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="ago"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_ago; ?>
            	</form>
            </td>

            <td <?php echo $corset; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="setembro"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_set; ?>
            	</form>
            </td>

            <td <?php echo $corout; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="outubro"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_out; ?>
            	</form>
            </td>

            <td <?php echo $cornov; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="nov"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_nov; ?>
            	</form>
            </td>

            <td <?php echo $cordez; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysql_query("SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="dez"/>
           			<input type="hidden" name="aluno" value="<?php echo $nome; ?>"/>
           			<?php echo $input_dez; ?>
            	</form>
            </td>

        </tr>
    </tbody>

<!-- Modal Novo Pagamento Quadra -->
<div id="modalPgtoQuadra" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formReceita" action="<?php echo base_url() ?>index.php/lancamentosquadra/adicionarReceita" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar Pagamento Quadra - Receita</h3>
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
  <form id="formDespesa" action="<?php echo base_url() ?>index.php/lancamentosquadra/adicionarDespesa" method="post">
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

    
<?php
if(isset($_POST['excluir'.$id])) {
	// Recupera os dados dos campos
	$id_men = $_POST['id_men'.$id];
	$cliente = $_POST['cliente'.$id];
$sql = mysql_query("DELETE from mensalidades WHERE id = '".$id_men."'");
		if ($sql){$this->session->set_flashdata('success',"Mensalidades de <b>$cliente</b> removidas com sucesso!");
		redirect('mensalidades');
}}
?>


<?php
if(isset($_POST['edit'.$id])) {
	// Recupera os dados dos campos
	$clientes_id = $_POST['clientes_id'.$id];
	$ano = $_POST['ano'.$id];
	$vencimento = $_POST['vencimento'.$id];
	$idServico = $_POST['idServico'.$id];
	$servico = $_POST['servico'.$id];

if($idServico == 0){
	$this->session->set_flashdata('error',"É necessário cadastrar o serviço <b>$servico</b> para lançar as mensalidades. Clique no botão <b>+Equipe</b>");
	redirect('mensalidades');
}else{
$sql = mysql_query("UPDATE mensalidades SET servico_id = '".$idServico."', ano = '".$ano."', data_pagamento = '".$vencimento."' WHERE id = '".$clientes_id."'");
		if ($sql){$this->session->set_flashdata('success',"Aluno atualizado com sucesso!");
		redirect('mensalidades');
		}
}}
?>
<!-- Modal Ver -->
<div id="modalVer<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Visualizar</h3>
  </div>

 <div class="modal-body">
		<div class="span8" style="float: left;">
		<?php
			$selecionar_cliente_innerjoin = mysql_query("SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysql_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
			<label><b>Aluno: </b><?php echo $nomeCliente;?></label>
		<?php }?>  
			<br />
		<?php
			$selecionar_servico_innerjoin = mysql_query("SELECT * FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
			while($ln = mysql_fetch_array($selecionar_servico_innerjoin)){
				$nome = $ln['nome'];
				$preco = $ln['preco'];
		?>
			<label><b>Equipe: </b><?php echo $nome;?></label>
			<label><b>Preço: </b>R$ <?php echo $preco;?></label>
		<?php
			$selecionar_vencimento = mysql_query("SELECT data_pagamento FROM mensalidades WHERE id = $id LIMIT 1");
			while($ln = mysql_fetch_array($selecionar_vencimento)){
				$data_pagamento = $ln['data_pagamento'];
		?>
			<label><b>Vencimento: </b>dia <?php echo $data_pagamento;?></label>
			
			
		<?php }}?>  
		</div>
  		
  		
  		  <div style="float: right;width:150px;">
                <ul class="site-stats">
                <li style="width: 100%;margin:0;right: 20px;border: 1px dashed #ccc;background-color:#eee;">
                <i class="icon-barcode"></i>
	                 <form action="<?php echo base_url() ?>index.php/relatorios/carne" method="get">
		                 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
		                 <input type="submit" style="border: none;background:transparent" value="Gerar Recibo" value="Gerar Recibo" />
						 
	                 </form>
                 </li>   
  				</ul>
 		</div>
 		</div>
 		
 		
  <div class="modal-footer">
    <a href="#modalEdit<?php echo $id;?>" data-toggle="modal"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" style="float: left">Editar Mensalidades</button></a>
	<a href="'.base_url().'index.php/servicos/visualizar/'.$r->idServicos.'" class="btn tip-top" title="Lançamentos">Pagamentos</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>


    <!-- Modal editar -->
<div id="modalEdit<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="" method="post">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<?php
			$selecionar_cliente_innerjoin = mysql_query("SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysql_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
    <h3 id="myModalLabel">Alterar Mensalidade de <?php echo $nomeCliente;?></h3>
  </div>
  <div class="modal-body">
  		
  		<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento de todos os campos.</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Aluno</label>
    			<input class="span12" id="cliente<?php echo $id;?>" type="text" disabled="" value="<?php echo $nomeCliente;?>" style="cursor: default"/>
		<?php }?>
    			<input id="clientes_id<?php echo $id;?>" class="span12" type="hidden" name="clientes_id<?php echo $id;?>" value="<?php echo $id;?>" />
    		</div>
    	</div>
    	
    	<div class="span12" style="margin-left: 0">
            <input type="hidden" name="idServico<?php echo $id;?>" id="idServico<?php echo $id;?>" value=""/>
            <label for="">Equipes</label>
            <input type="text" class="span12" name="servico<?php echo $id;?>" id="servico<?php echo $id;?>" placeholder="Digite o nome do serviço" required="" />
    	</div>	

    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="ano">Ano</label>
					<div class="styled-select">
						<select name="ano<?php echo $id;?>" class="span7">
			    				<option selected=""><?php echo $anoatual; ?></option>
								<option disabled="">-------</option>
								<option>2021</option>
						</select>
		    		</div>
    		</div>

    		<div class="span4" style="margin-left: 0">  
				<label for="">Data Base Pagamento</label>
            	<input type="text" class="span12" name="vencimento<?php echo $id;?>" id="vencimento<?php echo $id;?>" maxlength="2" required=""/>

    		</div>
    	</div>
  </div>
  <div class="modal-footer">
    <a href="#modal-excluir<?php echo $id;?>" data-toggle="modal"><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="float: left;">Excluir Mensalidades</button></a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" name="edit<?php echo $id;?>" class="btn btn-success" value="Salvar"></input>
  </div>
  </form>
</div>

<!-- Modal Excluir-->
<div id="modal-excluir<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Cobranças</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" name="id_men<?php echo $id;?>" value="<?php echo $id;?>" />
		<?php
			$selecionar_cliente_innerjoin = mysql_query("SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysql_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
    <input type="hidden" name="cliente<?php echo $id;?>" value="<?php echo $nomeCliente;?>" />
    <h5 style="text-align: center">Deseja realmente excluir as mensalidades de <?php echo $nomeCliente;?></h5>
		<?php }?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" class="btn btn-danger" name="excluir<?php echo $id;?>" value="Excluir">
  </div>
  </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
      $("#servico<?php echo $id;?>").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServico<?php echo $id;?>").val(ui.item.id);
            }
      });
});

</script>

    
<?php } echo "</table>";} ?>
</div>
</div>
	
<?php echo $this->pagination->create_links();?>


<!-- Modal adicionar novo -->
<div id="modalAddNovo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formAddNovo" action="" method="post">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Adicionar Mensalidade</h3>
  </div>
  <div class="modal-body">
  		
  		<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento de todos os campos.</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Cliente</label>
    			<input class="span12" id="cliente" type="text" name="cliente" value=""/>
    			<input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
    		</div>
    	</div>
    	
    	<div class="span12" style="margin-left: 0">
            <label for="">Equipe</label>
            <input type="text" class="span12" name="servico" id="servico" placeholder="Digite o nome da EQUIPE" />
			<input type="hidden" name="idServico" id="idServico"/>
    	</div>	

    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="ano">Ano</label>
					<div class="styled-select">
						<select name="ano" class="span11">
			    				<option selected=""><?php echo $anoatual; ?></option>
								<option disabled="">-------</option>
								<option>2021</option>
						</select>
		    		</div>
    		</div>
    		
    		<div class="span4" style="margin-left: 0">  
				<label for="">Data Base Pagamento</label>
            	<input type="text" class="span12" name="vencimento" id="vencimento" maxlength="2"/>

    		</div>
    	</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" name="addnovo" class="btn btn-success" value="Salvar"></input>
  </div>
  </form>
</div>




<?php
$anoanterior = $anoselecionado - 1;
?>
<!-- Modal Importar-->
<a href="#modal-importar" data-toggle="modal" id="modalimportar" class=""></a>
<div id="modal-importar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Importar Mensalidades de <?php echo $anoanterior;?></h5>
  </div>
  <div class="modal-body">
    <input type="hidden" name="anoanterior" value="<?php echo $anoanterior ?>" />
    <input type="hidden" name="anoselecionado" value="<?php echo $anoselecionado ?>" />
    <h5 style="text-align: center">Deseja importar as mensalidades ativas do ano anterior?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" class="btn btn-success" name="importar" value="Importar">
  </div>
  </form>
</div>


<!-- Modal Importar Vazio-->
<a href="#modal-importar_vazio" data-toggle="modal" id="modalimportar_vazio" class=""></a>
<div id="modal-importar_vazio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Importar Mensalidades</h5>
  </div>
  <div class="modal-body">
    <h5 style="text-align: center">Não existem mensalidades no ano anterior (<?php echo $anoanterior;?>) para serem importadas!</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".money").maskMoney();


   $(document).on('click', 'a', function(event) {
        
        var os = $(this).attr('os');
        $('#idOs').val(os);

    });
    
      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                 $("#servico").focus();
            }
      })
	  $("#clientePagamento").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_idPagamento").val(ui.item.id);
                 $("#servico").focus();
            }
      })
	  $("#clienteDesconto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_idDesconto").val(ui.item.id);
                 $("#servico").focus();
            }
      })
      
      $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServico").val(ui.item.id);
            }
      });
	  $("#servicoPagamento").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServicoPagamento").val(ui.item.id);
            }
      });
	  $("#servicoDesconto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServicoDesconto").val(ui.item.id);
            }
      });

	

      $("#formAddNovo").validate({
          rules:{
             cliente: {required:true},
             servico: {required:true},
             vencimento: {required:true},
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             servico: {required: 'Campo Requerido.'},
             vencimento: {required: 'Campo Requerido.'},
          },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
       });

	   $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

});




</script>