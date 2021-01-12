<?php
session_start();

const senhapadrao = "mozzatotv2020";

if(!$_POST){
  header('Location: ../views/index.php');
}else{
  include './dbconnect.php';

  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];

  $queryconsulta = 'Select * from usuarios_gravacoes where usu_nome ="'. $usuario .'" and usu_senha ="'. $senha .'" limit 1';
  $ret = mysqli_query($con, $queryconsulta);
  $row = mysqli_fetch_array($ret);
}
session_start();
if($row){
  $_SESSION[ 'autenticado' ] = true;
  $_SESSION[ 'cod_usuario' ] = $row['usu_codigo'];
  $_SESSION[ 'nome_usuario' ] = $row['usu_nome'];
  header('Location: ../views/painel.php');
}else {
  $_SESSION[ 'falha_login' ] = false;
  header('Location: ../views/index.php');
}
?>
