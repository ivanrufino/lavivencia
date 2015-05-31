<div class='col-sm-12 corpo'>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Dados Pessoais</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
                <p>Dados Clínica</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" >3</a>
                <p>Contato</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" >4</a>
                <p>Dados de Saida</p>
            </div>
        </div>
    </div>
    <?php 
    if($this->session->flashdata('msg')){
        echo $this->session->flashdata('msg');
    }
    echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <form role="form" action="{base_url}cliente/alterar_cliente/<?= $cliente['ID']?>" method="POST">
        <!-- Campos ocultos-->
        <input type="hidden" name="FK_CONTATO" value="<?=$cliente['FK_CONTATO']?>">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados Pessoais</h3>


                    <div class='col-md-8'>
                        <div class="form-group">
                            <label class="control-label">NOME</label>
                            <input maxlength="80" type="text"  name='NOME' id='NOME' class="form-control" required="required" placeholder="Digite o NOME" value="<?php echo $cliente['NOME']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">INSCRIÇÃO</label>
                            <input maxlength="15" type="text" name='INSCRICAO' id='INSCRICAO' required="required" class="form-control" placeholder="Digite a INSCRIÇÃO" value="<?php echo $cliente['INSCRICAO']; ?>"/>
                        </div>
                    </div>

                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">DATA DE NASCIMENTO</label>
                            <input maxlength="1000" type="DATE" name='DTNASCIMENTO' id='DTNASCIMENTO' class="form-control" placeholder="DD/MM/AA" required="" value="<?php echo $cliente['DT_NASCIMENTO']; ?>"/>
                        </div>
                    </div>

                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ESTADO CIVIL</label>
                            <input  maxlength="20" type="text"  name='ESTADOCIVIL' id='ESTADOCIVIL' class="form-control" placeholder="Digite o ESTADO CIVIL" value="<?php echo $cliente['EST_CIVIL']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">CPF</label>
                            <input  maxlength="15" type="text"   name='CPF' id='CPF' class="form-control" placeholder="Digite o n. do CPF" value="<?php echo $cliente['CPF']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">IDENTIDADE</label>
                            <input  maxlength="15" type="text"  name='IDENTIDADE' id='IDENTIDADE' class="form-control" placeholder="Digite o n. da IDENTIDADE" value="<?php echo $cliente['IDENTIDADE']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ORGÃO</label>
                            <input  maxlength="10" type="text"  name='ORGAO' id='ORGAO' class="form-control" placeholder="Digite o ORGÃO EMISSOR" value="<?php echo $cliente['ORGAO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">FOTO</label>
                            <input  type="file"  name='FOTO' id='FOTO' class="form-control" placeholder="FOTO" />
                        </div>
                    </div>
                    <div class='clearfix'></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados relativos à Lavivencia</h3>
                    
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label" for="COBRE_INTERNACAO">Cobre Internação </label>
                            <input   type="checkbox" name='COBRE_INTERNACAO' id='COBRE_INTERNACAO' class="form-control" placeholder="" value="S" <?php echo $cliente['COBRE_INTERNACAO']=="S"? 'checked':""; ?>/>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label" form="COBRE_REMOCAO">Cobre Remoção</label>
                            <input   type="checkbox" name='COBRE_REMOCAO' id='COBRE_REMOCAO' class="form-control" placeholder="" value="S"<?php echo $cliente['COBRE_REMOCAO']=="S"? 'checked':""; ?>/>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label" form="TEMPORARIO">Temporário</label>
                            <input   type="checkbox" name='TEMPORARIO' id='TEMPORARIO' class="form-control" placeholder="" value="S"<?php echo $cliente['TEMPORARIO']=="S"? 'checked':""; ?>/>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Plano de Saúde</label>
                             <select class="form-control" name='FK_PLANO_SAUDE' id='FK_PLANO_SAUDE'>
                                <option value="">Selecione o Plano de Saúde</option>
                                <?php foreach ($planos as $plano) { ?>
                                    <option value='<?= $plano['ID'] ?>'> <?= $plano['NOME']?> </option>
                                <?php } ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label">Quarto</label>
                            <input   type="text" name='QUARTO' id='QUARTO' class="form-control" placeholder="" value="<?php echo $cliente['QUARTO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label">Cama </label>
                            <input   type="text" name='CAMA' id='CAMA' class="form-control" placeholder="" value="<?php echo $cliente['CAMA']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Dieta </label>
                            <select class="form-control" name='FK_DIETA' id='FK_DIETA'>
                                <option value="">Selecione a Dieta</option>
                                <?php foreach ($dietas as $dieta) { ?>
                                    <option value='<?= $dieta['ID'] ?>'> <?= $dieta['NOME']?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Origem</label>
                            <input   type="text" name='ORIGEM' id='ORIGEM' class="form-control" placeholder="" value="<?php echo $cliente['ORIGEM']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Diagnóstico </label>
                            <textarea class='form-control' name='DIAGNOSTICO' id='OBSERVACAO' placeholder="Digite o DIAGNOSTICO"><?php echo $cliente['DIAGNOSTICO']; ?> </textarea>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Observação </label>
                            <textarea class='form-control' name='OBSERVACAO' id='OBSERVACAO' placeholder="Digite a OBSERVACAO"><?php echo $cliente['OBSERVACAO']; ?> </textarea>
                        </div>
                    </div>
                   
          
                    

                    <div class='clearfix'></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados do Contato</h3>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Nome</label>
                            <input   type="text"  name='nome_contato' id='nome_contato' class="form-control" placeholder="Digite o Nome do Contato"  value="<?php echo $contato['NOME']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Parentesco</label>
                            <input   type="text"  name='PARENTESCO' id='PARENTESCO' class="form-control" placeholder="Digite o Parentesco" value="<?php echo $contato['PARENTESCO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ENDEREÇO</label>
                            <input  maxlength="50" type="text"  name='ENDERECO' id='ENDERECO' class="form-control" placeholder="Digite o ENDEREÇO" value="<?php echo $contato['ENDERECO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">SUBBAIRRO</label>
                            <input  maxlength="80" type="text"  name='SUBBAIRRO' id='SUBBAIRRO' class="form-control" placeholder="Digite o SUBBAIRRO" value="<?php echo $contato['SUBBAIRRO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">BAIRRO</label>
                            <input  maxlength="80" type="text"  name='BAIRRO' id='BAIRRO' class="form-control" placeholder="Digite o BAIRRO" value="<?php echo $contato['BAIRRO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">MUNICIPIO</label>
                            <select class="form-control" name='FKMUNICIPIO' id='MUNICIPIO'>
                                <option value="">Selecione o MUNICIPIO</option>
                                <?php foreach ($municipios as $municipio) { ?>
                                    <option value='<?= $municipio['ID'] ?>'> <?= $municipio['NOME']?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">CEP</label>
                            <input  maxlength="10" type="text"  name='CEP' id='CEP' class="form-control" placeholder="Digite o CEP" value="<?php echo $contato['CEP']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">UF</label>
                            <input  maxlength="2" type="text"  name='UF' id='UF'  class="form-control" placeholder="Digite o UF" value="<?php echo $contato['UF']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Referencias</label>
                            <input   type="text"  name='REFERENCIAS' id='REFERENCIAS'  class="form-control" placeholder="Digite a REFERENCIAS" value="<?php echo $contato['REFERENCIAS']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">IDENTIDADE</label>
                            <input  maxlength="15" type="text"  name='identidade_contato' id='identidade_contato' class="form-control" placeholder="Digite o n. da IDENTIDADE " value="<?php echo $contato['IDENTIDADE']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ORGÃO</label>
                            <input  maxlength="10" type="text"  name='orgao_contato' id='orgao_contato' class="form-control" placeholder="Digite o ORGÃO EMISSOR" value="<?php echo $contato['ORGAO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Telefone</label>
                            <input  type="text"  name='TELEFONES' id='TELEFONES' class="form-control" placeholder="Digite o TELEFONE" value="<?php echo $contato['TELEFONES']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input  type="text"  name='EMAIL' id='EMAIL' class="form-control" placeholder="Digite o EMAIL" value="<?php echo $contato['EMAIL']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Data de Nascimento</label>
                            <input  type="text"  name='dt_nascimento_contato' id='dt_nascimento_contato' class="form-control" placeholder="Digite a Data de Nascimento" value="<?php echo $contato['DT_NASCIMENTO']; ?>"/>
                        </div>
                    </div>
                    
                    <div class='clearfix'></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>


            </div>
        </div>        
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados de Saida</h3>
                    
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Data de Saida</label>
                            <input   type="date"   class="form-control" name='DT_SAIDA' id='DT_SAIDA' placeholder="Digite a Data de Saida" value="<?php echo $cliente['DT_SAIDA']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">Motivo de Saida</label>
                            <textarea class='form-control' name='MOTIVO_SAIDA' id='MOTIVO_SAIDA' placeholder="Digite o Motivo de Saida"><?php echo $cliente['MOTIVO_SAIDA']; ?> </textarea>    
                        </div>
                    </div>
                    
                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>
            </div>
        </div>
    </form>
</div>

