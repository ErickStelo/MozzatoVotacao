<?php
$host = "mysql873.umbler.com:41890";
$user = "mozzatouser2";
$password = "Mozzato2345";
$db = "mozzatobanco2";
$con = @mysqli_connect($host, $user, $password, $db) or die (print_r('<h2>Falha ao conectar com  o banco de dados. Entre em contato com a equipe!</h2><br><b>Retorno obtido: </b>').mysqli_connect_error());
?>
