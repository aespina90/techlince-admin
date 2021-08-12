<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Cadastro de Aluno</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formAluno" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nomeAluno" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeAluno" type="text" name="nomeAluno" value="<?php echo set_value('nomeAluno'); ?>" autocomplete="off" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="nascimento" class="control-label">Nascimento</label>
                        <div class="controls">
                            <input id="nascimento" type="text" name="nascimento" value="<?php echo set_value('nascimento'); ?>" autocomplete="off" />
                        </div>
                    </div>             
                    
                    <div class="control-group">
                        <label for="rg" class="control-label">RG</label>
                        <div class="controls">
                            <input id="rg" type="text" name="rg" value="<?php echo set_value('rg'); ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cpf" class="control-label">CPF</label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo set_value('cpf'); ?>" autocomplete="off" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone</label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" autocomplete="off" value="<?php echo set_value('telefone'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="email" class="control-label">E-mail</label>
                        <div class="controls">
                            <input id="email" type="text" name="email" autocomplete="off" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Endereço</label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" autocomplete="off" value="<?php echo set_value('rua'); ?>Nome da Rua"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número</label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" autocomplete="off" value="<?php echo set_value('numero'); ?>S/N"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Bairro</label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" autocomplete="off" value="<?php echo set_value('bairro'); ?>Perus"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Cidade</label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" autocomplete="off" value="<?php echo set_value('cidade'); ?>São Paulo"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">Estado</label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" autocomplete="off" value="<?php echo set_value('estado'); ?>SP"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CEP</label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" autocomplete="off" value="<?php echo set_value('cep'); ?>00.000-00"  />
                        </div>
            </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
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

$("#telefone").mask("(99) 99999-9999");
$("#rg").mask("99.999.999-9");
$("#cpf").mask("999.999.999-99");
$("#telefone2").mask("(99) 99999-9999");
$("#nascimento").mask("99/99/9999");

           $('#formAluno').validate({
            rules :{
                  nomeAluno:{ required: true},
                  apelido:{ required: false},
                  rg:{ required: false},
                  cpf:{ required: false},
                  telefone:{ required: false},
                  email:{ required: false},
                  rua:{ required: false},
                  numero:{ required: false},
                  bairro:{ required: false},
                  cidade:{ required: false},
                  estado:{ required: false},
                  cep:{ required: false}
            },
            messages:{
                  nomeAluno :{ required: 'Campo Requerido.'},
                  apelido:{ required: 'Campo Requerido.'},
                  rg:{ required: 'Campo Requerido.'},
                  cpf:{ required: 'Campo Requerido.'},
                  telefone:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
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




