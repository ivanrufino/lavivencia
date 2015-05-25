<style>
    table.dataTable thead .sorting_asc {
        background-image: url("<?= base_url() ?>assets/imagens/sort_asc.png");
        background-repeat: no-repeat;
        background-position: center right;
        cursor: pointer;
    }
    table.dataTable thead .sorting_desc{ 
        background-image: url("<?= base_url() ?>assets/imagens/sort_desc.png");
        background-repeat: no-repeat;
        background-position: center right;
        cursor: pointer;}
    //.sorting_asc{color: red}
    table.dataTable thead  .sorting{
        background-image: url("<?= base_url() ?>assets/imagens/sort_both.png");
        background-repeat: no-repeat;
        background-position: center right;
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function () {
        $(".tables").dataTable({
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
                "sEmptyTable": "Nenhum funcionário registrado",
                "sInfoEmpty": '',
                "sInfo": "_TOTAL_ registros, mostrando de _START_ at&eacute; _END_",
                "sInfoFiltered": " - Quantidade Total _MAX_ registros",
                "sSearch": "Filtrar Registros:",
                "oPaginate": {"sFirst": "Início", "sPrevious": "Anterior", "sNext": "Pr&oacute;ximo", "sLast": "Último"}
            },
        });
//    $('#table_funcionario').DataTable({
//        "aaSorting": [[0, 'asc']]   
//    });
        $(".excluir").click(function () {
            var respostaSim = confirm("Você confirma a exclusão deste funcionario.");
            if (!respostaSim) {
                return false;
            }
        })
        $('#div_medi , #div_pa').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var cliente = button.data('cliente') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
         //   modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body #id_cliente').val(cliente)
        })
        
        $('#div_pa').on('shown.bs.modal', function (event) {
            var modal = $(this)
            var id= modal.find('.modal-body #id_cliente').val();
            var caminho = "<?=  base_url('cliente/pressaoArterial')?>/"+id;
            
            modal.find('.modal-body .conteudoPA').load(caminho);
           // $( "#result" ).load( "ajax/test.html" );
            
        })
    });

</script>
<?php
if (isset($this->dadosUsuario['GERAL']) && $this->dadosUsuarioGERAL = '1') {
    $disabled['incluir'] = '';
    $disabled['editar'] = '';
    $disabled['excluir'] = '';
    $disabled['rel'] = '';
    $disabled['visalizarPressao'] = '';
    $disabled['marcarPressao'] = '';
    $disabled['extra'] = '';
} else {
    $disabled['incluir'] = in_array(1, $funcoes) ? '' : 'disabled';
    $disabled['editar'] = in_array(2, $funcoes) ? '' : 'disabled';
    $disabled['excluir'] = in_array(3, $funcoes) ? '' : 'disabled';
    $disabled['rel'] = in_array(4, $funcoes) ? '' : 'disabled';
    $disabled['visalizarPressao'] = in_array(5, $funcoes) ? '' : 'disabled';
    $disabled['marcarPressao'] = in_array(6, $funcoes) ? '' : 'disabled';
    $disabled['extra'] = 'disabled';
    if (in_array(5, $funcoes) || in_array(6, $funcoes)) {
        $disabled['extra'] = '';
    }
}
?>
<div class="table-responsive col-sm-12 corpo">

    <a href='{base_url}cliente/incluir' class="btn btn-success <?= $disabled['incluir'] ?>" style="float:right">Novo Cliente</a>

    <table class="table table-bordered table-striped tables" id='table_funcionario'>
        <thead>
            <tr>
                <th >NOME</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td nowrap><?= ($cliente['NOME']) ?></td>


                    <td nowrap>
                        <a href="{base_url}cliente/editar/<?= $cliente['ID'] ?>" class='btn btn-info btn-sm <?= $disabled['editar'] ?>' ><i class="fa fa-pencil-square-o"> </i> Editar</a>
                        <a href="{base_url}cliente/excluir/<?= $cliente['ID'] ?>" class='btn btn-danger btn-sm excluir <?= $disabled['excluir'] ?>' ><i class="fa fa-trash-o"> </i> Excluir </a>
                        <a href="{base_url}cliente/gerarRelatorio/<?= $cliente['ID'] ?>" class='btn btn-sm btn-default <?= $disabled['rel'] ?>' ><i class="fa fa-file-text-o"> </i> Rel </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-smdropdown-toggle <?= $disabled['extra'] ?>" data-toggle="dropdown" aria-expanded="false">
                                Outras opções <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" data-toggle="modal" data-target="#div_pa" data-cliente="<?= $cliente['ID'] ?>" >Pressão Arterial</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#div_medi" data-cliente="<?= $cliente['ID'] ?>" >Medicamentos</a></li>
                                <li><a href="#">Outra Opção</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Mais uma</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
<!--pressão arterial-->
<div class="modal fade" id="div_pa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Marcação de Pressão Arterial</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ID" id="id_cliente" readonly="">
                <div class="conteudoPA">Carregando... </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </div>
</div>
<!--medicamentos do cliente-->
<div class="modal fade" id="div_medi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Medicamentos Receitados</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ID" id="id_cliente" readonly="">
                <div class="conteudoMed">Carregando... </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </div>
</div>