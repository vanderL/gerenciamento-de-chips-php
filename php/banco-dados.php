<?php
# TABELA TB_CHIP

# função para lista todos os chips listandos com inner join junção de tabale, mysqli_query você escrever a query,  mysqli_fetch_assoc você transforma o resultado
# em um array associativo
#você atráves de um loop e a função array push enviar esses valores para o array chips.
function totalChips($conexao){
    $chips = array();
$resultado = mysqli_query($conexao, "select c.*, o.DESCRICAO from TB_CHIP as c join TB_OPERADORA as o on c.OPERADORA = o.CD_OPERADORA;" 

    );

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
    
function listaChips($conexao, $inicio, $totalReg){
    $chips = array();
    $query = "select c.*, o.DESCRICAO as operadora_nome from TB_CHIP as c join TB_OPERADORA as o on c.OPERADORA = o.CD_OPERADORA ORDER BY c.ID_CHIP LIMIT ".$inicio.", ".$totalReg;
    $resultado = mysqli_query($conexao, $query);

	while($chip = mysqli_fetch_assoc($resultado)) :
		array_push($chips, $chip);
	endwhile;
    
	return $chips;
}

function detalheChips($conexao, $id){
    $chips = array();
    $resultado = mysqli_query($conexao, "select * FROM TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where ID_CHIP = '$id';");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}

# função para inseri chips, recebendo os paramentros do formulario
#if serve para fazer uma validação, mas recomendavel fazer uma validação tamb´me na página com javascript
# depois da query escrita, você retorna ela.
function insereChip($conexao, $ddd, $numero, $operadora, $status, $gateway, $cpf, $data, $saldo, $obs, $dataex) {

	if(($conexao != null) && ($ddd != null) && ($numero != null) && ($operadora != null) && ($cpf != null) && ($data != null)){
		//$saldo = 0.0;


        
        $query = "insert into TB_CHIP (DDD, TELEFONE, OPERADORA, STATUS, GATEWAY, CPF, DATA_ATIVACAO, SALDO, OBSERVACOES, DATA_EXPIRACAO ) values ('$ddd', '$numero', '$operadora', '$status', '$gateway', '$cpf', '$data', '$saldo', '$obs', '$dataex' );";
        return mysqli_query($conexao, $query);
   	}
}
#função para remover dados, depois da query escrita você retorna ela.
function removeChip($conexao, $id) {
    $query = "delete from TB_CHIP where ID_CHIP = {$id}";
    return mysqli_query($conexao, $query);
}

# função de altera chips, alterandos atráves dos parementos recebidos pelo o form, alguns dos parametros vem preenchido
#pelo o banco.
function alteraChip($conexao, $ddd, $numero, $cpf, $operadora, $status, $gateway, $id) {
    $query = "update TB_CHIP set DDD = '$ddd', TELEFONE = '$numero', CPF = '$cpf', OPERADORA = '$operadora', 
        STATUS = '$status', GATEWAY = '$gateway' where ID_CHIP = '$id'";
        return mysqli_query($conexao, $query);
}

#Função para busca chip pelo o id, servindo de auxilio na função AlteraChip na página de edita chip
function buscaChip($conexao, $id) {
    $query = "select * from TB_CHIP where ID_CHIP = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
# BUSCA PELO O DDD
function buscaddd($conexao, $ddd, $inicio, $totalReg) {
    $chips = array();
    $resultado = mysqli_query($conexao, "select * from TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where DDD like '%".$ddd."%' ORDER BY ID_CHIP LIMIT ".$inicio.", ".$totalReg);

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;

}
function tamddd($conexao, $ddd) {
    $chips = array();
    $resultado = mysqli_query($conexao, "select * from TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where DDD like '%".$ddd."%'");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;

}
#BUSCA PELO O TELEFONE
function buscaTelefone($conexao, $telefone, $inicio, $totalReg) {
    $chips = array();
    $resultado = mysqli_query($conexao, "select * from TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where TELEFONE like '%".$telefone."%' ORDER BY ID_CHIP LIMIT ".$inicio.", ".$totalReg);

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;

}
function tamTelefone($conexao, $telefone) {
    $chips = array();
    $resultado = mysqli_query($conexao, "select * from TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where TELEFONE like '%".$telefone."%'");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;

}
#BUSCA PELA A DATA
function buscaOperadora($conexao, $operadora, $inicio, $totalReg) {
    $chips = array();
    $resultado = mysqli_query($conexao, "select * FROM TB_CHIP join TB_OPERADORA on OPERADORA = CD_OPERADORA where DESCRICAO like '%".$operadora."%' ORDER BY ID_CHIP LIMIT ".$inicio.", ".$totalReg);

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;

}

 # TABELA TB_OPERADORA
# mesma lógica da função listaChips
function listaOperadora($conexao) {
    $operadoras = array();
    $query = "select * from TB_OPERADORA";
    $resultado = mysqli_query($conexao, $query);
    while($operadora = mysqli_fetch_assoc($resultado)) {
        array_push($operadoras, $operadora);
    }
    return $operadoras;
}

# TOTAL CHIPS DA OI

function totalChipsOi($conexao){
    $chips = array();
$resultado = mysqli_query($conexao, "select * from TB_CHIP where OPERADORA = 10;" 

    );

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
# TOTAL CHIPS DA TIM

function totalChipsTim($conexao){
    $chips = array();
$resultado = mysqli_query($conexao, "select * from TB_CHIP where OPERADORA = 11;" 

    );

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
# TOTAL CHIPS DA CLARO

function totalChipsClaro($conexao){
    $chips = array();
$resultado = mysqli_query($conexao, "select * from TB_CHIP where OPERADORA = 12;" 

    );

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
# TOTAL CHIPS DA VIVO
function totalChipsVivo($conexao){
    $chips = array();
$resultado = mysqli_query($conexao, "select * from TB_CHIP where OPERADORA = 13;" 

    );

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}

# RELATÓRIO EM CSV
function arrayParaCsv($chips)
{
   if (count($chips) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("lista-chip.csv", 'w');
   fputcsv($df, array_keys(reset($chips)));
   foreach ($chips as $chip) {
      fputcsv($df, $chip);
   }
   fclose($df);
   return ob_get_clean();
}

function cabecalhoDownloadCsv($filename) {
    # desabilitar cache
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    #forçar download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    # disposição do texto / codificação
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}


# FUNÇÃO PARA USUARIO LOGADO

function usuarioAtivo($conexao, $usuarioEmail){
    $query = "update TB_USUARIO_LOGADO SET usuario = '$usuarioEmail' where id_login = 1;";
     return mysqli_query($conexao, $query);
}
/*$query = "update TB_CHIP set DDD = '$ddd', TELEFONE = '$numero', CPF = '$cpf', OPERADORA = '$operadora', 
        STATUS = '$status', GATEWAY = '$gateway' where ID_CHIP = '$id'";
        return mysqli_query($conexao, $query);*/





function totalInsertUser($conexao, $usuario){
    $chips = array();
   // $att = "Inserção";
$resultado = mysqli_query($conexao, "select * from TB_MONITORAMENTO_ACOES where usuario = '$usuario' and acao = 'Inserção';");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
function totalDelUser($conexao, $usuario){
    $chips = array();
    $att = "remover";
$resultado = mysqli_query($conexao, "select * from TB_MONITORAMENTO_ACOES where usuario = '$usuario' and acao = '$att';");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
function totalUpUser($conexao, $usuario){
    $chips = array();
    $att = "atualizacao";
$resultado = mysqli_query($conexao, "select * from TB_MONITORAMENTO_ACOES where usuario = '$usuario' and acao = '$att';");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}
function totalUp($conexao, $usuario){
    $chips = array();
$resultado = mysqli_query($conexao, "select * from TB_MONITORAMENTO_ACOES where usuario = '$usuario';");

    while($chip = mysqli_fetch_assoc($resultado)) :
        array_push($chips, $chip);
    endwhile;
    return $chips;
}

