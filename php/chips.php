<?php 
require_once("logica-usuario.php");
verificaUsuario();
include("cabecalho.php");
include("conexao.php"); 
include("banco-dados.php"); 
	$operadoras = listaOperadora($conexao);
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
		
<?php if(array_key_exists("removido", $_GET) && $_GET['removido'] == true) : ?>
	<p class="alert-success">Chip apagado com sucesso</p>
<?php 
	endif
 ?>

<?php if(array_key_exists("add", $_GET) && $_GET['add'] == true) : ?>
	<p class="alert-success">Chip adicionado com sucesso</p>
<?php 
	endif
 ?>

 <?php if(array_key_exists("altera", $_GET) && $_GET['altera'] == true) : ?>
	<p class="alert-success">Chip alterado com sucesso</p>
<?php 
	endif
 ?>
<table class="table2 table-striped table-bordered">
	<form action="lista-chip.php" method="get">
		<tr>
			<input type="hidden" name="acao" value="02" />
			<td class="col-md-1"><input class="form-control" type="text" placeholder="Busca pelo o ddd" name="ddd"></td>
			<td class="col-md-1"><input class="form-control" type="text" placeholder="Busca pelo o telefone" name="telefone"></td>
			<td class="col-md-1"><input class="form-control" type="text" placeholder="Busca pela a operadora" name="operadora"></td>
			<td class="col-md-1"><input class="form-control" type="text" placeholder="Busca pela a data recarga" name="data"></td>

			<td class="col-md-1"><input class="btn btn-default" type="submit"> </td>
		</tr>
	</form>
	<tr>
		<td><h5><strong>DDD</strong></h5></td>
		<td><h5><strong>TELEFONE</strong></h5></td>
		<td><h5><strong>OPERADORA</strong></h5>
		<td><h5><strong>STATUS</strong></h5></td>
		<td><h5><strong>FUNÇÕES</strong></h5>
	
	</tr>
	<?php
		$inicio = $pc - 1; 
		$inicio = $inicio * $totalReg;


		$chips = listaChips($conexao, $inicio, $totalReg);
		foreach($chips as $chip) :
	?>
	<tr>
		<td><?= $chip['DDD']; ?></td>
		<td><?= $chip['TELEFONE']; ?></td>
		<td><?= $chip['operadora_nome']; ?></td>
		<td> <?= $chip['STATUS'] != 1 ? "Desativo" : "Ativo"; ?> </td>
		<td class="col-md-1">
			<a href="lista-chip.php?id=<?=$chip['ID_CHIP']?>&acao=01"><img src="imgs/atualizar.png"></a>
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
				$total = sizeof(totalChips($conexao));
				$numPaginas = ceil($total/$totalReg);

				 if($pagina > 1) {
				 	echo "<li>";
			        echo "<a href='chips.php?pagina=".($pagina - 1)."' aria-label='Previous'>";
			        echo "<span aria-hidden='true'> &laquo; anterior</span>";
			        echo "</a>";
			        echo "</li>";
			    }
			     
			    for($i = 1; $i < $numPaginas + 1; $i++) {
			        echo "<li> <a href='chips.php?pagina=".$i."'> ".$i." </a> </li>";
			    }
			         
			    if($pagina < $numPaginas) {
			    	echo "<li>";
			        echo "<a href='chips.php?pagina=".($pagina + 1)."' aria-label='Next'>";
			        echo "<span aria-hidden='true'> &raquo; proximo</span>";
			        echo "</a>";
			        echo "</li>";

			    }
			?>
		</ul>

	</div>

</nav>

<?php include("rodape.php"); ?>