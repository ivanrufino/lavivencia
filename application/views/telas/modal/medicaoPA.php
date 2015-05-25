<script>
    $(document).ready(function () {
        $(".tableMarcacao").dataTable({
            "sDom": '<"col-md-4 col-xs-5"f>rt<"col-md-4 col-sm-8 col-xs-12 "i><"col-md-4 col-sm-4 hidden-xs"l><"col-md-4 text-right"p> <"clear">',
            "iDisplayLength": 10,
            "bDeferRender": true,
            "bPaginate": true,
            "bFilter": true,
            "aaSorting": [[0, "asc"]],
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
                "sEmptyTable": "Nenhuma marcação registrada",
                "sInfoEmpty": '',
                "sInfo": "_TOTAL_ registros, mostrando de _START_ at&eacute; _END_",
                "sInfoFiltered": " - Quantidade Total _MAX_ registros",
                "sSearch": "Filtrar Registros:",
                "oPaginate": {"sFirst": "Início", "sPrevious": "Anterior", "sNext": "Pr&oacute;ximo", "sLast": "Último"}
            },
        });
    });
</script>
<label for="observacao">Observação</label>
<textarea class="form-control" id="observacao" name="OBSERVACAO" placeholder="Observação"><?= isset($medicoes[0]['OBSERVACAO'])? $medicoes[0]['OBSERVACAO']:"" ?></textarea>
<div class="col-sm-12 table-responsive">
    <a href='{base_url}funcionario/incluir' class="btn btn-success " style="float:right">Nova Marcação</a>
<table class="tableMarcacao table-bordered table-condensed table-hover table-striped col-xs-12">
    <thead>
        <tr>
            <th>Data</th>
            <th>PS</th>
            <th>PD</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medicoes as $medicao) {?>
        <tr>
            <td><?= $medicao['data']?></td>
            <td><?= $medicao['PS']?></td>
            <td><?= $medicao['PD']?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
    </div>
<?php $meses_extenso = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
?>

<div class="col-xs-12 hide">
    <form class="form-horizontal">
        <div class="form-group ">
            <label  class="col-sm-2 control-label" for="data">Data</label>
            <div class="col-sm-10">
            <select class="form-control " id="data">
                <?php foreach ($datas as $data) { ?>
                    <option value="<?= $data['MES'] . '_' . $data['ANO'] ?>"><?= $data['ANO'] . ' - ' . $meses_extenso[$data['MES']] ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
      
        
        <div class="form-group col-xs-6">
            <label class="col-sm-2 control-label" for="PS">PS</label>
            <div class="col-sm-10">
            <input type="text" id="PS" name="PS" class="form-control">
            </div>
        </div>
        <div class="form-group col-xs-6">
            <label class="col-sm-2 control-label" for="PD">PD</label>
            <div class="col-sm-10">
            <input type="text" id="PD" name="PS" class="form-control">
            </div>
        </div>
        
        <div class="clearfix"></div>
            
        <div class="col-xs-12">retorno</div>
    </form>
</div>

