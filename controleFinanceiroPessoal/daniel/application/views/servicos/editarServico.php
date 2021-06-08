<div class="row-fluid" style="margin-top:0">
                              <div class="span12">
                                    <div class="widget-box">
                                          <div class="widget-title">
                                                <span class="icon">
                                                      <i class="icon-align-justify"></i>
                                                </span>
                                                <h5>Editar Equipe</h5>
                                          </div>
                                          <div class="widget-content nopadding">
                                                <?php echo $custom_error; ?>
                                                <form action="<?php echo current_url(); ?>" id="formServico" method="post" class="form-horizontal" >
                                                    <?php echo form_hidden('idServicos',$result->idServicos) ?>
                                                    <div class="control-group">
                                                            <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                                            <div class="controls">
                                                                  <input id="nome" type="text" name="nome" value="<?php echo $result->nome ?>"  autocomplete="off" />
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="clienteResponsavel" class="control-label"><span class="required">Cliente Responsável*</span></label>
                                                            <div class="controls">
                                                                <input id="clienteResponsavel" type="text" name="clienteResponsavel" value="<?php echo $result->clienteResponsavel ?>"  autocomplete="off" />
                                                                <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="preco" class="control-label"><span class="required">Valor*</span></label>
                                                            <div class="controls">
                                                                <input id="preco" class="money" type="text" name="preco" value="<?php echo $result->preco ?>" />
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="diaJogo" class="control-label"><span class="required">Dia de Jogo*</span></label>
                                                            <div class="controls">
                                                             
                                                                <select name="diaJogo" id="diaJogo" value="<?php echo $result->diaJogo ?>" >
		    			                                          <option value="SEGUNDA-FEIRA">SEGUNDA-FEIRA</option>
		    			                                          <option value="TERÇA-FEIRA">TERÇA-FEIRA</option>			
		    			                                          <option value="QUARTA-FEIRA">QUARTA-FEIRA</option>			
		    			                                          <option value="QUINTA-FEIRA">QUINTA-FEIRA</option>			
		    			                                          <option value="SEXTA-FEIRA">SEXTA-FEIRA</option>			
		    			                                          <option value="SÁBADO">SÁBADO</option>			
		    			                                          <option value="DOMINGO">DOMINGO</option>			
		    		                                        </select>
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="inicioPartida" class="control-label"><span class="required">Início da Partida*</span></label>
                                                            <div class="controls">
                                                                <input id="inicioPartida" type="time" name="inicioPartida" value="<?php echo $result->inicioPartida ?>" autocomplete="off" />
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="fimPartida" class="control-label"><span class="required">Fim da Partida*</span></label>
                                                            <div class="controls">
                                                                <input id="fimPartida" type="time" name="fimPartida" value="<?php echo $result->fimPartida ?>" autocomplete="off" />
                                                            </div>
                                                      </div>
                                                      <div class="control-group">
                                                            <label for="quadra" class="control-label"><span class="required">Quadra*</span></label>
                                                            <div class="controls">
                                                                <select name="quadra" id="quadra" value="<?php echo $result->quadra ?>">
		    			                                    <option value="Q-01">Q-01</option>
		    			                                    <option value="Q-02">Q-02</option>					
		    		                                        </select>
                                                            </div>
                                                      </div>

                                                      <div class="form-actions">
                                                      <div class="span12">
                                                            <div class="span6 offset3">
                                                            <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                                            <a href="<?php echo base_url()?>index.php/servicos" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                                                            </div>
                                                      </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                              </div>
</div>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
$("#clienteResponsavel").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
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
      $(document).ready(function(){
          $(".money").maskMoney();
           $('#formServico').validate({
            rules :{
                  nome:{ required: true},
                  preco:{ required: true}
            },
            messages:{
                  nome :{ required: 'Campo Requerido.'},
                  preco :{ required: 'Campo Requerido.'}
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
      });
</script>



