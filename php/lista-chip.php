<?php

require_once("logica-usuario.php");
verificaUsuario();
include("cabecalho.php");
include("conexao.php");
include("banco-dados.php");


$id = $_GET['id'];
$acao = $_GET['acao'];

$ddd = $_GET['ddd'];
$telefone = $_GET['telefone'];
$operadoram = $_GET['operadora'];
$operadora = strtoupper($operadoram);
if ($id != null || $ddd != null || $telefone != null || $operadoram != null) {

$totalReg = 20;

?>

<?php
	$pagina = $_GET['pagina']; 

	if (!$pagina) { 
		$pc = "1"; 
	} else { 
		$pc = $pagina; 
	} 

?>

	<table class="table table-striped table-bordered">
		<tr>
			<td><h5><strong>DDD</strong></h5></td>
			<td><h5><strong>TELEFONE</strong></h5></td>
			<td><h5><strong>CPF</strong></h5>
			<td><h5><strong>SALDO</strong></h5></td>
			<td><h5><strong>DATA RECARGA</strong></h5>
			<td><h5><strong>OBSERVAÇÕES</strong></h5>
			<td><h5><strong>OPERADORA</strong></h5>
			<td><h5><strong>STATUS</strong></h5>
			<td><h5><strong>GATEWAY</strong></h5>

		</tr>
	<?php

		$inicio = $pc - 1; 
		$inicio = $inicio * $totalReg;

		if($acao == 01) {
			$chips = detalheChips($conexao, $id);
			} 
		else if ($acao == 02 & $ddd != null) {
			$chips = buscaddd($conexao, $ddd, $inicio, $totalReg);
			$total = sizeof(tamddd($conexao, $ddd, $inicio, $totalReg));
			} 
		else if ($acao == 02 & $telefone != null) {
			$chips = buscaTelefone($conexao, $telefone, $inicio, $totalReg);
			$total = sizeof(tamTelefone($conexao, $telefone));
			}
		else if ($acao == 02 & $operadora != null) {
			$chips = buscaOperadora($conexao, $operadora, $inicio, $totalReg);
			if($operadora == "OI"){
				$total = sizeof(totalChipsOi($conexao));
				}
			else if ($operadora == "TIM"){
				$total = sizeof(totalChipsTim($conexao));
				}
			elseif ($operadora == "CLARO") {
				$total = sizeof(totalChipsClaro($conexao));
				}
			elseif ($operadora == "VIVO") {
				$total = sizeof(totalChipsVivo($conexao));
			}
			}

		foreach($chips as $chip) :

		$date = $chip['DATA_ATIVACAO'];
		$date = explode("-", $date);
		$data = $date[2]."/".$date[1]."/".$date[0];

		$dateex = $chip['DATA_EXPIRACAO'];
		$dateex = explode("-", $dateex);
		$dataex = $dateex[2]."/".$dateex[1]."/".$dateex[0];
	?>
	<tr>
		<td><?= $chip['DDD']; ?></td>
		<td><?= $chip['TELEFONE']; ?></td>
		<td><?= $chip['CPF']; ?></td>
		<td>R$ <?= $chip['SALDO']; ?></td>
		<td><?= $data; ?></td>
		<td><? $chip['OBSERVACOES'];?></td>
		<td><?= $chip['DESCRICAO']; ?></td>
		<td><?= $chip['STATUS'] != 1 ? "Desativo" : "Ativo"; ?> </td>
		<td><?= $chip['GATEWAY'] != false ? "No Gateway" : "Fora do Gateway"; ?></td>
		<td>
			<a href="chips.php"><img src="imgs/atualizar.png"></a>
			<a href="editar-chip.php?id=<?=$chip['ID_CHIP']?>"><img src="imgs/edit.png"></a>
			<a onclick="return confirm('Você tem certeza que quer excluir esse item?');" href="remove-chip.php?id=<?=$chip['ID_CHIP']?>"><img src="imgs/remover.png"></a>
		</td>
	</tr>

	<?php
		endforeach	
	?>
</table>
<nav>
	<div class="btn-group">
		<ul class='pagination'>
	<?php
		
		$numPaginas = ceil($total/$totalReg);

		 if($pagina > 1) {
		 	echo "<li>";
	        echo "<a href='lista-chip.php?acao=02&ddd=".$ddd."&telefone=".$telefone."&operadora=".$operadora."&data=&pagina=".($pagina - 1)."' aria-label='Previous'>";
	        echo "<span aria-hidden='true'> &laquo; anterior</span>";
	        echo "</a>";
	        echo "</li>";
	    }
	     
	    for($i = 1; $i < $numPaginas + 1; $i++) {
	        echo "<li> <a href='lista-chip.php?acao=02&ddd=".$ddd."&telefone=".$telefone."&operadora=".$operadora."&data=&pagina=".$i."'> ".$i." </a> </li>";
	    }
	         
	    if($pagina < $numPaginas) {
	    	echo "<li>";
	        echo "<a href='lista-chip.php?acao=02&ddd=".$ddd."&telefone=".$telefone."&operadora=".$operadora."&data=&pagina=".($pagina + 1)."' aria-label='Next'>";
	        echo "<span aria-hidden='true'> &raquo; proximo</span>";
	        echo "</a>";
	        echo "</li>";

	    }
	?>
		</ul>
	</div>
</nav>
<?php
	
} else {
	?>
	<p class="text-danger">
		Ops, certifique-se de busca algo.
	</p>


<?php 
}
?>
<?php include("rodape.php"); ?>