<?php 
require_once("logica-usuario.php");
verificaUsuario();
include("conexao.php");
include("banco-dados.php");

$usuarioEmail = usuarioLogado();
usuarioAtivo($conexao, $usuarioEmail);

$id = $_GET['id'];
removeChip($conexao, $id);


header('Location: http://localhost/gerenciadordechips/chips.php?removido=true');
die();

?>