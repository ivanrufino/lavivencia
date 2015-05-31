<script>
    $(document).ready(function () {
        $(".tableMarcacao").dataTable({
            "sDom": '<"col-md-4 col-xs-5 "f>rt<"col-md-4 col-sm-8 col-xs-12 "i><"col-md-4 col-sm-4 hidden-xs"l><"col-md-4 text-right"p> <"clear">',
            "iDisplayLength": 10,
            "bDeferRender": true,
            "bPaginate": true,
            "bFilter": true,
            "aaSorting": [],
            "oLanguage": {
                "sLengthMenu": 'Mostrar <select>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        //'<option value="50">50</option>'+
                        '<option value="-1">All</option>' +
                        '</select> Registros',
                "sZeroRecords": "Nenhum registro para a pesquisa realizada!",
                "sEmptyTable": "Nenhuma marcação registrada para este mês",
                "sInfoEmpty": '',
                "sInfo": "_TOTAL_ registros, mostrando de _START_ at&eacute; _END_",
                "sInfoFiltered": " - Quantidade Total _MAX_ registros",
                "sSearch": "Filtrar Registros:",
                "oPaginate": {"sFirst": "Início", "sPrevious": "Anterior", "sNext": "Pr&oacute;ximo", "sLast": "Último"}
            },
        });
        $(".novaMarcacao").click(function () {
            $(".dadostabela").slideUp('slow')
            $(".dadosInclusao").slideDown('slow')
            $(".btn_medicoes, .salvarMarcacao").show()   
            return false;
        })
        $(".salvarMarcacao").click(function(){
             var options = {
            target: '.retorno', // target element(s) to be updated with server response 
        };
        $('.marcacao').ajaxSubmit(options);
        })
    });
</script>
<style>
    .dadosInclusao,.btn_medicoes{display: none}
</style>
<?php $meses_extenso = array('1'=>'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
?>

    
    <div class="col-sm-12 table-responsive dadostabela">
        <a href='' class="btn btn-success novaMarcacao" style="float:right">Nova Marcação</a>
        <table class="tableMarcacao table-bordered table-condensed table-hover table-striped col-xs-12">
            <thead>
                <tr>
                    <th style="width:60px">Dia</th>
                    <th style="width:100px">Mês</th>
                    <th style="width:80px">Ano</th>
                    <th>PS</th>
                    <th>PD</th>

                </tr>
            </thead>
            <tbody>
                <?php if ($medicoes){ ?>
                <?php foreach ($medicoes as $medicao) { ?>
                    <tr>
                        <!--            <?php $DATA = "{$medicao['DIA']} de {$meses_extenso[$medicao['MES']]} de {$medicao['ANO']}" ?>
                                    <td><?= $DATA ?></td>-->
                        <td><?= $medicao['DIA'] ?></td><td><?= $meses_extenso[$medicao['MES']] ?></td><td><?= $medicao['ANO'] ?></td>
                        <td><?= $medicao['PS'] ?></td>
                        <td><?= $medicao['PD'] ?></td>
                    </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>


    <div class="col-xs-12  dadosInclusao">
        <form class="form-horizontal marcacao" method="POST" action="<?=  base_url()?>cliente/marcarPressaoArterial">
            <input type='hidden' name='ID' value="<?=$ID?>">
         <div class="form-group col-sm-4">
        <label for="resp_tec" >Resp. Técnico</label>
        <input type="text" name="responsavel_tecnico" id="resp_tec" class="form-control" value="<?= isset($medicoes[0]['RESPONSAVEL_TECNICO']) ? $medicoes[0]['RESPONSAVEL_TECNICO'] : "" ?>">
    </div>
        <div class="col-sm-1"></div>
    <div class="form-group col-sm-4">
        <label for="resp_anot" >Resp. Anotação</label>
        <input type="text" name="responsavel_anotacao" id="resp_anot" class="form-control" value="<?= isset($medicoes[0]['RESPONSAVEL_ANOTACAO']) ? $medicoes[0]['RESPONSAVEL_ANOTACAO'] : "" ?>">
    </div>
    <div class="form-group col-sm-9">
        <label for="observacao" >Observação</label>        
            <textarea class="form-control" id="observacao" name="OBSERVACAO" placeholder="Observação"><?= isset($medicoes[0]['OBSERVACAO']) ? $medicoes[0]['OBSERVACAO'] : "" ?></textarea>
    </div>
        <div class="clearfix"></div>
        <div class="form-group col-sm-4">
            <label   for="data">Data</label>
            <input type="text" name="data" value="<?php echo $meses_extenso[date('n')]."-". date('Y'); ?>" class="form-control" readonly="" disabled="">
<!--                <select class="form-control " id="data">
                     <?php
                         $mes_atual = $datas['0']['MES'];
                        $ano_atual = $datas['0']['ANO'];
                     if($mes_atual < date('m')){ 
                        $novadata = somar_data("01/$mes_atual/$ano_atual", 0, 1, 0);
                        $novadata = explode('/', $novadata)
                        ?>
                        
                        <option value="<?= $novadata['1'] . '_' . $novadata['2'] ?>"><?= $novadata['2'] . ' - ' . $meses_extenso[$novadata['1']] ?></option>
                    <?php }
                    
                    
                    foreach ($datas as $data) { 
                    
                        ?>
                        <option value="<?= $data['MES'] . '_' . $data['ANO'] ?>"><?= $data['ANO'] . ' - ' . $meses_extenso[$data['MES']] ?></option>
                    <?php 
                    
                    } 
                    
                   
                    ?>
                </select>     -->
        </div>
        
        <div class="col-sm-1"></div>
        <div class="form-group col-sm-4 ">
            <label   for="data">Dia</label>
            <input type="number" min="<?= date('d') ?>" max="<?= date('d') ?>" value="<?= date('d') ?>" class="form-control" name="DIA" readonly="" disabled="">
        </div>
        <div class="col-sm-3"></div>

        <div class="form-group col-xs-6">
            <label  for="PS">PS</label>            
            <input type="text" id="PS" name="PS" class="form-control" min="0">            
        </div>
        <div class="form-group col-xs-6">
            <label  for="PD">PD</label>            
            <input type="text" id="PD" name="PD" class="form-control" min="0">            
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-12 retorno"></div>

    
</form>
</div>
<?php 
function somar_data($data, $dias, $meses, $ano){
  $data = explode("/", $data);
  $resData = date("d/n/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
  return $resData;
}
?>