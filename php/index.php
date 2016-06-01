<?php
require_once("logica-usuario.php");
verificaUsuario();
include("conexao.php");
include("cabecalho.php");
include("banco-dados.php");

//usuarioAtivo($conexao, $usuarioEmail);

?>  

        <?php if(usuarioEstaLogado()) {?>
        <?php } else {
          header("Location: login-user.php");
          die();
        } ?>
        <div class="jumbotron">
        <h2>Bem vindo ao gerenciador de chips</h2>
        <p>Atráves dessa plataforma você poderá cadastra, visualisa, altera e analisa o total de chips da AptaLaser LTDA</p>
      </div>
        <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
          <a href="formulario.php">
          <img class="img-circle" src="imgs/cadastrar.png" alt="Generic placeholder image" width="120" height="140">
          </a>
          <h2>Cadastrar</h2>
        </div>
      </div><!-- /.col-lg-4 -->
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
          <a href="chips.php">
          <img class="img-circle" src="imgs/chip.png" alt="Generic placeholder image" width="145" height="140">
          </a>
          <h2>Chips</h2>
        </div>
      </div>
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
          <a href="sobre.php">
          <img class="img-circle" src="imgs/informacao.png" alt="Generic placeholder image" width="120" height="140">
          </a>
          <h2>Informações</h2>   
        </div>
      </div>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
          <a href="#">
          <img class="img-circle" src="imgs/ajuda.png" alt="Generic placeholder image" width="120" height="140">
          </a>
          <h2>Ajuda</h2>
        </div><!-- /.col-lg-4 -->
        </div>
      </div>
       
<?php include("rodape.php"); ?>