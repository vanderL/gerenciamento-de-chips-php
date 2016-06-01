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
    <div id="wrap">
	 <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            	<a href="index.php" class="navbar-brand">Gerenciador de chips</a>
       		</div>
    	</div>
    </div>

    <div class="container">

        <div class="principal">
            <?php  mostraAlerta("success"); ?>
            <?php mostraAlerta("danger"); ?>
            <?php mostraAlerta("info"); ?>
