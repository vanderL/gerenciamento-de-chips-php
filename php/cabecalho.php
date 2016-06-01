<?php
error_reporting(E_ALL ^ E_NOTICE);
  require_once("mostra-alerta.php"); ?>
<html>
<head>
    <title>APTA CHIPS</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="ui/jquery-ui.js"></script>
    <script type="text/javascript" src="mask/jquery.mask.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/estilo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="ui/jquery-ui.css">
    <script type="text/javascript"> 
        $(document).ready(function(){
            $("#ddd").tooltip();
            $("#numero").tooltip();
            $("#cpf").tooltip();
            $("#data").tooltip();
            $("#dataex").tooltip();

            $("#cpf").mask("000.000.000-00");
            $("#data").mask("99/99/9999");
            $("#ddd").mask("99");
            $("#numero").mask("9-9999-9999");
            $("#dataex").mask("99/99/9999");

        });
    </script>
</head>

<body>
<?php 
$usuarioEmail = usuarioLogado();
$usuarioEmail = explode("@", $usuarioEmail);
$usuario = $usuarioEmail[0];
?>

    <div id="wrap">
	 <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            	<a href="index.php" class="navbar-brand">CHIP MANAGER</a>
       		</div>
        	<div>
           		<ul class="nav navbar-nav">
                	<li><a href="formulario.php">Adiciona Chip</a></li>
                	<li><a href="chips.php">Chips</a></li>
                	<li><a href="sobre.php">Sobre</a></li>
            	</ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i id="fonte" class="glyphicon glyphicon-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i><?=" ".ucfirst($usuario) ?></a>
                        </li>
                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                </ul>
                
        	</div>
    	</div>
    </div>

    <div class="container">

        <div class="principal">
            <?php  //mostraAlerta("success"); ?>
            <?php mostraAlerta("danger"); ?>
