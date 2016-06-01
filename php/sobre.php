<?php 
require_once("logica-usuario.php");
verificaUsuario();
include("cabecalho.php");
include("conexao.php"); 
include("banco-dados.php");
$chips = totalChips($conexao);
$chips = sizeof(totalChips($conexao));
$chipsOi = sizeof(totalChipsOi($conexao)); 
$chipsTim = sizeof(totalChipsTim($conexao)); 
$chipsClaro = sizeof(totalChipsClaro($conexao)); 
$chipsVivo = sizeof(totalChipsVivo($conexao)); 
 ?>
	 <div id="outer" class="col-xs-4 col-sm-8">
  <h2 class="form-signin-heading">Quantitativo de chips da apta </h2>
      <table id="tabela" class="table table-bordered">
          <tr>
            <th class="col-md-2" id="tabela" >OI</th>
            <th class="col-md-2" id="tabela" >TIM</th>
            <th class="col-md-2" id="tabela" >VIVO</th>
            <th class="col-md-2" id="tabela" >CLARO</th>
            <th class="col-md-2" id="tabela" >TOTAL</th>
          </tr>
          <tr>
            <td class="col-md-1" id="tabela2" ><?= $chipsOi ?> <br /></td>
            <td class="col-md-1" id="tabela2" ><?= $chipsTim ?> <br /></td>
            <td class="col-md-1" id="tabela2" ><?= $chipsVivo ?></td>
            <td class="col-md-1" id="tabela2" ><?= $chipsClaro ?> <br /></td>
            <td class="col-md-1" id="tabela2" ><?= $chips ?></td>
          </tr>
        
      </table>

<?php

//require 'exportcsv.inc.php';
//exportMysqlToCsv($table);

//arrayParaCsv($chips);
//cabecalhoDownloadCsv("lista_chip".date("Y-m-d").".csv");
//echo arrayParaCsv($chips);

//die(); 
?>
    
      </div>



<?php include("rodape.php"); ?>