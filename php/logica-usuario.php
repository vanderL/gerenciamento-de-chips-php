<?php
session_start();
function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
  if(!usuarioEstaLogado()) {
  	$_SESSION["info"] = "FAÇA SEU LOGIN";
 	header("Location: login-user.php");
 	die();
  }
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
}

function logout() {
	session_destroy();
	session_start();
}