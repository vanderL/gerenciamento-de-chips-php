<?php
require_once("logica-usuario.php");
verificaUsuario();
include("conexao.php");
include("banco-dados.php");
include("cabecalho.php");



$usuario = usuarioLogado();
$totalInsert = sizeof(totalInsertUser($conexao, $usuario));
$totalDel = sizeof(totalDelUser($conexao, $usuario));
$totalUp = sizeof(totalUpUser($conexao, $usuario));
echo "Total de inserções feitas : ".$totalInsert."<br />."."Total de remoções feitas :".$totalDel."<br />"."Total de atualizações: ".$totalUp;
?>




<?php
include("rodape.php");
?>
