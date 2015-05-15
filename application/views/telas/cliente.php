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
        $(".excluir").click(function(){
            var respostaSim = confirm("Você confirma a exclusão deste funcionario.");
            if(!respostaSim){
                return false;
            }
        })
    });
   
</script>

<div class="table-responsive col-sm-12 corpo">
    <a href='novo_funcionario' class="btn btn-success" style="float:right">Novo Cliente</a>
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
                        <a href="editar_funcionario/<?= $cliente['ID'] ?>" class='btn btn-info' >Editar</a>
                        <a href="excluir_funcionario/<?= $cliente['ID'] ?>" class='btn btn-danger excluir' >Excluir </a>
                        <a href="funcionario/gerarRelatorio/<?= $cliente['ID'] ?>" class='btn btn-default ' >Doc </a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

