<?php
session_start();
if(!$_POST){
  header('Location: ../views/index.php');
}else{
  $nome_usuario = $_POST['nome_usuario'];
  $senha_usuario = $_POST['senha_usuario'];

  unset($_SESSION['nome_usuario']);
  unset($_SESSION['senha_usuario']);

  include '../controllers/dbconnect.php';
  // CONSULTA SE JA ESTA AGENDADO
  $queryconsulta = 'Select * from usuarios_gravacoes where usu_nome = "'.$nome_usuario.'" and usu_senha = "'.$senha_usuario.'";';

  $ret = mysqli_query($con, $queryconsulta);
  $row = mysqli_fetch_row($ret);
  // SE NAO RETORNAR NENHUMA LINHA, ESTÁ LIVRE O USUARIO

  if(!$row){
    $queryadiciona = 'insert into usuarios_gravacoes (usu_nome, usu_senha) value ("'.$nome_usuario.'", "'.$senha_usuario.'")';
    $ret = mysqli_query($con, $queryadiciona);
    if ($ret == 1) {
      $_SESSION['alert-sucesso']=true;
      $_SESSION['alert-msg']='Usuário criado com sucesso!';
      header('Location: ../views/painel.php');
    }else {
      $_SESSION['alert-erro']=true;
      $_SESSION['alert-msg']='Erro ao criar usuário: '.mysqli_error($con);
      header('Location: ../views/painel.php');
    }
  }else{
    $_SESSION['alert-erro']=true;
    $_SESSION['alert-msg']='Usuário ja registrado!';
    header('Location: ../views/painel.php');
  }
}
?>
