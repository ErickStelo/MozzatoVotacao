<?php
session_start();

?>
<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MozzatoTV - Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Meu CSS -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-light bg-dark">
      <a href="./painel.php" class="navbar-brand">
        <img src="./img/logo.png" width="100px">
      </a>
    </nav>
    <div class="container mt-3 col-sm-3">
      <div class="card" id="formulario-pergunta">
        <div class="card-header">
          <h3>Mozzato TV</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="../controllers/login.php">
            <div class="row">
              <div class="col">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario">
              </div>
            </div>
            <div class="row pt-4">
              <div class="col">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha">
              </div>
            </div>
            <br>
            <button class="btn btn-success align-center btn-block">Acessar</button>
          </form>
          <?php if(isset($_SESSION[ 'falha_login' ])){ ?>
            <h6 class="p-3 mb-2 bg-danger text-white text-center">Senha incorreta, tente novamente!</h6>
          <?php }
          unset($_SESSION['falha_login']);
          session_destroy();?>
        </div>
      </div>
      <hr>
    </div>
  </body>

  </html>
