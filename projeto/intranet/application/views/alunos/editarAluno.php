<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Aluno</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formAluno" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('idAlunos',$result->idAlunos) ?>
                        <label for="nomeAluno" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeAluno" type="text" name="nomeAluno" value="<?php echo $result->nomeAluno; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apelido" class="control-label">Apelido</label>
                        <div class="controls">
                            <input id="apelido" type="text" name="apelido" value="<?php echo $result->apelido; ?>" autocomplete="off" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="nascimento" class="control-label">Nascimento</label>
                        <div class="controls">
                            <input id="nascimento" type="text" name="nascimento" value="<?php if($result->nascimento == "0000-00-00"){echo "";}else{echo date('d/m/Y', strtotime($result->nascimento));}?>" autocomplete="off" />
                        </div>
                    </div>                    
                    
                    <div class="control-group">
                        <label for="rg" class="control-label">RG</label>
                        <div class="controls">
                            <input id="rg" type="text" name="rg" value="<?php echo $result->rg; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cpf" class="control-label">CPF</label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo $result->cpf; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone</label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="email" class="control-label">E-mail</label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>" autocomplete="off"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="update" class="control-label">Receber Atualizações</label>
                        <div class="controls">
                            <input id="update" type="checkbox" name="update" value="1" <?php if($result->update == 1){echo "checked";}else{} ?> />
                        </div>
                    </div>


                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>index.php/alunos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskphone.js"></script>
<script type="text/javascript">
      $(document).ready(function(){

$("#telefone").mask("(99) 9999?9-9999");
$("#telefone2").mask("(99) 9999?9-9999");
$("#nascimento").mask("99/99/9999");
$("#rg").mask("99.999.999-9");
$("#cpf").mask("999.999.999-99");

           $('#formAluno').validate({
            rules :{
                  nomeAluno:{ required: true},
                  apelido:{ required: true},
                  rg:{ required: true},
                  cpf:{ required: true},
                  rua:{ required: true},
                  numero:{ required: true},
                  bairro:{ required: true},
                  cidade:{ required: true},
                  estado:{ required: true},
                  cep:{ required: true}
            },
            messages:{
                  nomeAluno :{ required: 'Campo Requerido.'},
                  apelido :{ required: 'Campo Requerido.'},
                  rg :{ required: 'Campo Requerido.'},
                  cpf :{ required: 'Campo Requerido.'},
                  rua:{ required: 'Campo Requerido.'},
                  numero:{ required: 'Campo Requerido.'},
                  bairro:{ required: 'Campo Requerido.'},
                  cidade:{ required: 'Campo Requerido.'},
                  estado:{ required: 'Campo Requerido.'},
                  cep:{ required: 'Campo Requerido.'}

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

