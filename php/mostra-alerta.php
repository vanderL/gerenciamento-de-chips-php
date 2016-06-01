<?php
session_start();
 function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) {
?>
	<h4 class="alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></h3>
<?php
		unset($_SESSION[$tipo]);
	 }
 }