<style>
    table{width: 100%}
    tbody tr:nth-child(odd) {background-color:#fff;  }  
    tbody tr:nth-child(even) {    background-color:#ccc;  } 
     table, tr,td{ border: 1px solid gray;border-collapse: collapse;}
</style>
<table>
    <thead>
<tr>
    <th colspan="2"><h3>Relatório funciónario: <?=$funcionario['NOME'] ?></h3></th>
</tr>
</thead>
<tbody>
    <?php
foreach ($funcionario as $key => $valor) {
    echo "<tr>";
    echo "<td>";
    echo "$key";
    echo  "</td><td>";
    echo "$valor";
    echo  "</td>";
    //str_pad("$key:", 20 , "_"). "$valor </div> ";
}
?>
</tbody>
</table>