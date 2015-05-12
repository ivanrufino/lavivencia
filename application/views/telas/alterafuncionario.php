<div class='col-sm-12 corpo'>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Dados Pessoais</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
                <p>Documentos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" >3</a>
                <p>Endereço</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" >4</a>
                <p>Dados Profissionais </p>
            </div>
        </div>
    </div>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    
    <form role="form" action="{base_url}funcionario/alterar_funcionario/<?=$funcionario['ID']?>" method="POST">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados Pessoais</h3>

                    <div class='col-md-2'>
                        <div class="form-group">
                            <label class="control-label">ID</label>
                            <input  maxlength="100" type="text" name='ID' id='ID' disabled="" readonly="" class="form-control" placeholder="Digite o ID" value="<?php echo $funcionario['ID']; ?>" />
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label class="control-label">NOME</label>
                            <input maxlength="80" type="text"  name='NOME' id='NOME' class="form-control" required="required" placeholder="Digite o NOME" value="<?php echo $funcionario['NOME']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">INSCRIÇÃO</label>
                            <input maxlength="15" type="text" name='INSCRICAO' id='INSCRICAO' required="required" disabled="" readonly="" class="form-control" placeholder="Digite a INSCRIÇÃO" value="<?php echo $funcionario['INSCRICAO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">EMAIL</label>
                            <input maxlength="50" name='EMAIL' id='EMAL' type="text"  class="form-control" placeholder="Digite o EMAIL" value="<?php echo $funcionario['EMAIL']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                              <?php 
                                if ($funcionario['TELEFONES'] != "") {
                                    $binfo = ibase_blob_info($funcionario['TELEFONES']);
                                    $bopen = ibase_blob_open($funcionario['TELEFONES']);
                                    $tel = ibase_blob_get($bopen, $binfo[0]);
                                } else {
                                    $tel = "";
                                  }
                            ?> 
                            <label class="control-label">TELEFONE</label>
                            <input  type="text"  name='TELEFONES' id='TELEFONES' class="form-control" placeholder="Digite o TELEFONE" value="<?php echo $tel; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">DATA DE NASCIMENTO</label>
                            <input maxlength="1000" type="DATE" name='DTNASCIMENTO' id='DTNASCIMENTO' class="form-control" placeholder="DD/MM/AA" value="<?php echo $funcionario['DTNASCIMENTO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">NOME DA MÃE</label>
                            <input   maxlength="50" type="text" name='NOME_MAE' id='NOME_MAE' class="form-control" placeholder="Digite o nome da MÃE" value="<?php echo $funcionario['NOME_MAE']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ESCOLARIDADE</label>
                            <select class="form-control" name='FKESCOLARIDADE' id=''>
                                <option value="">Selecione a ESCOLARIDADE</option>
                                <?php foreach ($escolaridades as $escolaridade) { ?>
                                    <option value='<?= $escolaridade['ID'] ?>'> <?= utf8_encode($escolaridade['NOME']) ?> </option>
                                <?php } ?>
                            </select>
                            <!--<input  type="text"  class="form-control" placeholder="Selecione a ESCOLARIDADE" />-->
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">FILHOS</label>
                            <input  type="number"  min="0" name='NUM_FILHOS' id='NUM_FILHOS' class="form-control" placeholder="Número de FILHOS" value="<?php echo $funcionario['NUM_FILHOS']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ESTADO CIVIL</label>
                            <input  maxlength="20" type="text"  name='ESTADOCIVIL' id='ESTADOCIVIL' class="form-control" placeholder="Digite o ESTADO CIVIL" value="<?php echo $funcionario['ESTADOCIVIL']; ?>"/>
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
                    <h3> Documentos</h3>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">IDENTIDADE</label>
                            <input  maxlength="15" type="text"  name='IDENTIDADE' id='IDENTIDADE' class="form-control" placeholder="Digite o n. da IDENTIDADE" value="<?php echo $funcionario['IDENTIDADE']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ORGÃO</label>
                            <input  maxlength="10" type="text"  name='ORGAO' id='ORGAO' class="form-control" placeholder="Digite o ORGÃO EMISSOR" value="<?php echo $funcionario['ORGAO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">CARTEIRA DE TRABALHO</label>
                            <input  maxlength="15" type="text" name='NUMCARTEIRA' id='NUMCARTEIRA' class="form-control" placeholder="Digite o n. da CARTEIRA DE TRBALHO" value="<?php echo $funcionario['NUMCARTEIRA']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">PIS</label>
                            <input  maxlength="15" type="text"   name='NUMPIS' id='NUMPIS' class="form-control" placeholder="Digite o n. do PIS" value="<?php echo $funcionario['NUMPIS']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">CNH</label>
                            <input  maxlength="15" type="text"   name='NUMCNH' id='NUMCNH' class="form-control" placeholder="Digite o n. da CNH" value="<?php echo $funcionario['NUMCNH']; ?>"/>
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
                    <h3> Endereço</h3>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ENDEREÇO</label>
                            <input  maxlength="50" type="text"  name='ENDERECO' id='ENDERECO    ' class="form-control" placeholder="Digite o ENDEREÇO" value="<?php echo $funcionario['ENDERECO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">SUBBAIRRO</label>
                            <input  maxlength="80" type="text"  name='SUBBAIRRO' id='SUBBAIRRO' class="form-control" placeholder="Digite o SUBBAIRRO" value="<?php echo $funcionario['SUBBAIRRO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">BAIRRO</label>
                            <input  maxlength="80" type="text"  name='BAIRRO' id='BAIRRO' class="form-control" placeholder="Digite o BAIRRO" value="<?php echo $funcionario['BAIRRO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">MUNICIPIO</label>
                            <select class="form-control" name='FKMUNICIPIO' id='MUNICIPIO'>
                                <option value="">Selecione o MUNICIPIO</option>
                                <?php foreach ($municipios as $municipio) { ?>
                                    <option value='<?= $municipio['ID'] ?>'> <?= utf8_encode($municipio['NOME']) ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">CEP</label>
                            <input  maxlength="10" type="text"  name='CEP' id='CEP' class="form-control" placeholder="Digite o CEP" value="<?php echo $funcionario['CEP']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">UF</label>
                            <input  maxlength="2" type="text"  name='UF' id='UF'  class="form-control" placeholder="Digite o UF" value="<?php echo $funcionario['UF']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">NATURALIDADE</label>
                            <select class="form-control" name='FKNATURALIDADE' id='NATURALIDADE'>
                                <option value="">Selecione a NATURALIDADE</option>
                                <?php foreach ($naturalidades as $naturalidade) { ?>
                                    <option value='<?= $naturalidade['ID'] ?>'> <?= utf8_encode($naturalidade['NOME']) ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!--                    <div class='col-md-4'>
                                            <div class="form-group">
                                                <label class="control-label">PAIS</label>
                                                 <select class="form-control">
                                                     <option value="">Selecione o PAIS</option>
                    <?php foreach ($paises as $pais) { ?>
                                                        <option value='<?= $naturalidade['ID'] ?>'> <?= utf8_encode($naturalidade['NOME']) ?> </option>
                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>-->
                    <div class='clearfix'></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>


            </div>
        </div>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados Profissionais</h3>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">FUNCAO</label>
                            <select class="form-control" name='FKFUNCAO' id='FUNCAO' >
                                <!--<option value="">Selecione a FUNCÃO</option>-->
                                <?php foreach ($funcoes as $funcao) { ?>
                                    <option value='<?= $funcao['ID'] ?>'> <?= utf8_encode($funcao['NOME']) ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">REFERENCIAS</label>
                            <input  maxlength="50" type="text"   class="form-control" name='REFERENCIAS' id='REFERENCIAS' placeholder="Digite as REFERENCIAS" value="<?php echo $funcionario['REFERENCIAS']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">DATA DE ADMISSÃO</label>
                            <input  maxlength="15" type="date"   name='DTADMISSAO' id='DTADMISSAO' class="form-control"  value="<?php echo $funcionario['DTADMISSAO']; ?>"/>
                        </div>
                    </div>
                    <!--                    
                                        <div class='col-md-4'>
                                            <div class="form-group">
                                                <label class="control-label">INDICAÇAO</label>
                                                 <select class="form-control">
                                                     <option value="">Selecione a INDICAÇÃO</option>
                    <?php foreach ($indicacoes as $indicacao) { ?>
                                                        <option value='<?= $indicacao['ID'] ?>'> <?= utf8_encode($indicacao['NOME']) ?> </option>
                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>-->

                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">SALARIO</label>
                            <input   type="text"   class="form-control" name='SALARIO' id='SALARIO' placeholder="Digite o SALARIO" value="<?php echo $funcionario['SALARIO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <div class="form-group">
                            <label class="control-label">OBSERVACAO</label>
                            <textarea class='form-control' name='OBSERVACAO' id='OBSERVACAO' placeholder="Digite a OBSERVACAO">
                                <?php 
                                if ($funcionario['OBSERVACAO'] != "") {
                                    $binfo = ibase_blob_info($funcionario['OBSERVACAO']);
                                    $bopen = ibase_blob_open($funcionario['OBSERVACAO']);
                                    $obs = utf8_encode(ibase_blob_get($bopen, $binfo[0]));
                                } else {
                                    $obs = "";
                                  }
                            echo trim($obs); ?> 
                            </textarea>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">TURNO</label>
                            <input  maxlength="30" type="text"   class="form-control" name='TURNO' id='TURNO' placeholder="Digite o TURNO" value="<?php echo $funcionario['TURNO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">INDICADO</label>
                            <input  maxlength="80" type="text"   class="form-control" name='INDICADO' id='INDICADO' placeholder="Digite o INDICADO" value="<?php echo $funcionario['INDICADO']; ?>"/>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label class="control-label">ATIVO</label>
                            <input   type="checkbox"  checked="" name='INATIVO' id='INATIVO' class="form-control"  />
                        </div>
                    </div>

                    <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Dados!</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--


r.FKFUNCAO, dpro
r.REFERENCIAS, dpro
r.CODIGO, dpro

r.DTADMISSAO, dpro
r.FKINDICACAO, dpro
r.SALARIO, dpro
r.OBSERVACAO, dpro
r.TURNO, dpro
r.INDICADO, dpro
r.INATIVO dpro
-->