<?php
require_once("logica-usuario.php");
verificaUsuario();
include("cabecalho.php");
include("conexao.php");
include("banco-dados.php");

$id = $_GET['id'];
$chip = buscaChip($conexao, $id);
$operadoras = listaOperadora($conexao);


    $date = $chip['DATA_ATIVACAO'];
    $date = explode("-", $date);
    $data = $date[2]."/".$date[1]."/".$date[0];

    //alteraChip($conexao, $ddd, $numero, $operadora, $status);

?>
 <form method="post" class="form" action="atualiza-chip.php">
    <table class="table">
            <input type="hidden" name="id" value="<?=$chip['ID_CHIP']?>" />
            <tr>
                <td><label>DDD</label></td>
                <td> <input type="number" name="ddd" value="<?= $chip['DDD']; ?>" class="form-control" /></td>
            </tr>

            <tr>
                <td><label>Numero</label></td>
                <td><input type="number" name="numero" value="<?= $chip['TELEFONE']; ?>" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Cpf</label></td>
                <td><input type="text" name="cpf" value="<?= $chip['CPF']; ?>" class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Data Ativação</label></td>
                <td><input type="text" name="data" id="data" value="<?= $data; ?>" class="form-control" /></td>
            </tr>
            <?php 
                $gateway = $chip['GATEWAY'] ? "checked='checked'" : "";
            ?>
            
            <tr>
                <td><label>Operadora</label></td>
                <td><select name="operadora" class="form-control">
                    <?php foreach($operadoras as $operadora) :
                            $essaEhAOperadora = $chip['OPERADORA'] == $operadora['CD_OPERADORA'];
                            $selecao = $essaEhAOperadora ? "selected='selected'" : "";

                    ?>
                        <option name="operadora" value="<?= $operadora['CD_OPERADORA'] ?>" <?=$selecao?> ><?= $operadora['DESCRICAO'] ?></option>
                    <?php endforeach ?>
                </td></select>
            </tr>
            <?php 
            $statusA = $chip['STATUS'] ? "checked='checked'" : "";
            $statusB = $chip['STATUS'] ? "" : "checked='checked'"; 
            ?>
            <tr>
                <td><label>Status</label></td>
                <td><input type="radio" name="status" <?=$statusA ?> id="astatus" value="1"><label for="astatus">Ativo</label>
                    <input type="radio" name="status" <?=$statusB ?> id="dstatus" value="0"><label for="dstatus">Desativo</label></td>

            </tr>
             <tr>
                <td></td>
                <td><input type="checkbox" name="gateway" <?=$gateway?> value="true"> Ativo no Gateway
            </tr>
              <tr>
                <td><input type="submit" value="Alterar" class="btn btn-primary"/></td>
            </tr>

        </table>
    </form>

<?php include("rodape.php"); ?>