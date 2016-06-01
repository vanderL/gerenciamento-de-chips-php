<?php
require_once("logica-usuario.php");
verificaUsuario();
include("conexao.php");
include("banco-dados.php");

$usuarioEmail = usuarioLogado();
usuarioAtivo($conexao, $usuarioEmail);

#recebendo os valores do formulario.
$ddd = $_POST["ddd"];
$numero = $_POST["numero"];
$cpf = $_POST["cpf"];
$date = $_POST["data"];
$operadora = $_POST["operadora"];
$status = $_POST["status"];
$gateway = $_POST['gateway'];
$dateex = $_POST['dataex'];
$obs = $_POST['obs'];
$saldo = $_POST['saldo'];

# função para que a variavel $gateway e caso de falso não retorne vazio.
if(array_key_exists('gateway', $_POST)) {
	$gateway = "1";
} else {
    $gateway = "0";
}

$date = explode("/", $date);
$data = $date[2]."-".$date[1]."-".$date[0];

$dateex = explode("/", $dateex);
$dataex = $dateex[2]."-".$dateex[1]."-".$dateex[0];


#se a função inseri chip fucionar chama a função Location.
if(insereChip($conexao, $ddd, $numero, $operadora, $status, $gateway, $cpf, $data, $saldo, $obs, $dataex)) {
	header('Location: http://localhost/gerenciadordechips/chips.php?add=true');
} else{
# variavel para indentifica o erro no mysqli.

include("cabecalho.php");
$msg = mysqli_error($conexao);  ?>

	<p class="text-danger">
		Ops, ocorreu um error, verifica: <?php echo $msg ?>
	</p>

<?php
}
# fim da conexão.
	mysqli_close($conexao);
	


include("rodape.php"); ?>