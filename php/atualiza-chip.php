<?php
require_once("logica-usuario.php");
verificaUsuario();
include("conexao.php");
include("banco-dados.php");

$usuarioEmail = usuarioLogado();
usuarioAtivo($conexao, $usuarioEmail);

#recebendo os valores do formulario.
	$id = $_POST["id"];
	$ddd = $_POST["ddd"];
	$numero = $_POST["numero"];
	$cpf = $_POST['cpf'];
	$operadora = $_POST["operadora"];
	$status = $_POST["status"];
	$gateway = $_POST["gateway"];

# função para que a variavel $gateway e caso de falso não retorne vazio.

	if(array_key_exists('gateway', $_POST)) {
    $gateway = "1";
} else {
    $gateway = "0";
}


#se a função inseri chip fucionar chama a função Location.
	if(alteraChip($conexao, $ddd, $numero, $cpf, $operadora, $status, $gateway, $id)) {
 		header('Location: http://localhost/gerenciadordechips/chips.php?altera=true');
} else{
# variavel para indentifica o erro no mysqli.

	$msg = mysqli_error($conexao);
#include do cabeçalho apos o Localtion, para não causa conflito e o error se mostrado.
include("cabecalho.php");  ?>

		<p class="text-danger">
			Ops, ocorreu um error, verifica: <?php echo $msg ?>
		</p>

	<?php
	}
# fim da conexão.
	mysqli_close($conexao);


include("rodape.php"); ?>