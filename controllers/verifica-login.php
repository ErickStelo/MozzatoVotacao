<?php
session_start();
// Verifica se não há uma sessao ativa (!$_SESSION)
if(!isset($_SESSION[ 'autenticado' ])) {
	header('Location: ../index.php');
  session_destroy();
	exit();
}
?>
