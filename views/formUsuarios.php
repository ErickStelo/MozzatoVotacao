<?php
require '../controllers/verifica-login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MozzatoTV - Adicionar Usuário</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <!-- Meu CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-light bg-dark">
    <a href="./painel.php" class="navbar-brand">
      <img src="./img/logo.png" width="100px">
    </a>
  </nav>
  <div class="container mt-3 col-sm-5">
    <div class="card" id="formulario-pergunta">
      <div class="card-header">
        <h3>Adicionar Usuario</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="../controllers/addUsuario.php">
          <label id=>Nome de Usuario</label>
          <input type="text" name="nome_usuario" maxlength="50" required class="form-control" placeholder="Usuario">
          <br>
          <label>Senha</label>
          <input type="password" name="senha_usuario" maxlength="10" required class="form-control" placeholder="Senha">
          <br>
          <button class="btn btn-success" type="submit">Adicionar</button>
        </form>
      </div>
    </div>
    <hr>
  </div>
</body>

</html>
