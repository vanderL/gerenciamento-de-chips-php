<?php 
require_once("logica-usuario.php");
verificaUsuario();
include("cabecalho.php"); 
include("conexao.php");
include("banco-dados.php");


# preencendo o array $operadores com a lista de Operadoras da função listaOperadora
# Lembrando que toda função que faz CONEXAO com o banco de dados recebe como paramentro a variavel $conexao
# Cujo está sendo criada numa página separada conexao.php




$operadoras = listaOperadora($conexao);

?>
     
     <h1>Cadastra Chips</h1>

     <form action="adiciona-chip.php" method="post">
        <table class="table">
            <tr>
                <td><label>DDD</label></td>
                <td> <input type="text" name="ddd" class="form-control" maxlength="2" required/></td>
            </tr>

            <tr>
                <td><label>Numero</label></td>
                <td><input type="text" name="numero"  class="form-control" maxlength="9" minlength="8" required/></td>
            </tr>
            <tr>
                <td><label>Cpf</label></td>
                <td><input type="text" name="cpf"  id="cpf" class="form-control" maxlength="11" minlength="11" /></td>
            </tr>
             <tr>
                <td><label>Saldo</label></td>
                <td><input type="number" name="saldo" maxlength="10" minlength="10"class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Data Ativação</label></td>
                <td><input type="text" name="data" id="data" data-mask="0000/00/00" maxlength="10" minlength="10"class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Data Expiração</label></td>
                <td><input type="text" name="dataex" id="dataex" data-mask="0000/00/00" maxlength="10" minlength="10"class="form-control" /></td>
            </tr>
            <tr>
                <td><label>Observações</label></td>
                <td><textarea name="obs" class="form-control"></textarea></td>
            </tr>
            <tr>
            
                <td><label>Operadora</label></td>
                <td><select name="operadora" class="form-control">
                    <option>Selecione a operadora</option>
                    <?php 
                    #Loop para recebe os valores da função listaOperadora  " todas as funções estão no banco-dados.php"
                        foreach($operadoras as $operadora) : ?>
                        <option name="operadora" value="<?= $operadora['CD_OPERADORA'] ?>"><?= $operadora['DESCRICAO'] ?></option>
                    <?php endforeach ?>
                </td></select>
            </tr>
            <tr>
                <td><label>Status</label></td>
                <td><input type="radio" name="status" id="astatus" value="1"><label for="astatus">Ativo</label>
                <input type="radio" name="status" id="dstatus" value="0"><label for="dstatus">Desativo</label></td>

            </tr>
              <tr>
                <td></td>
                <td><input type="checkbox" name="gateway" value="true"> Ativo no Gateway
            </tr>
              <tr>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary"/></td>
            </tr>

        </table>

    </form>
<?php include("rodape.php"); ?>