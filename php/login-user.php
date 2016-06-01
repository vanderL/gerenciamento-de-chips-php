<?php
require_once("logica-usuario.php");
if(usuarioEstaLogado()) {
  header("Location: index.php");
} else {
include("cabecalho-user.php");

?>

<div class="container">
    <div class="row2">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="login.php" method="post"> 
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">
                            Email</label>
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-1 col-sm-6">
                            <button type="submit" class="btn btn-success btn-sm">
                                Entrar</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Limpar</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    Não Registrado? <a href="#">Registre-se aqui</a></div>
            </div>
        </div>
    </div>
</div>
       
<?php include("rodape.php"); ?>