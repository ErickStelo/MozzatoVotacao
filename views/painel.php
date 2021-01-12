<?php
require '../controllers/verifica-login.php';
?>
<body>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MozzatoTV - Painel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/53206850d8.js"></script>
    <!-- Meu CSS -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-light bg-dark">
      <a href="./painel.php" class="navbar-brand">
        <img src="./img/logo.png" width="100px">
      </a>
    </nav>
    <div class="container mt-3 col-sm-5">
      <div class="card" id="menu">
        <div class="card-header">
          <h3>Menu</h3>
        </div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item"><a href="../views/agendar.php"><i class="fa fa-calendar-plus-o fa-1x" aria-hidden="true"></i> Agendar Gravação</a></li>
            <li class="list-group-item"><a href="../views/consultar.php"><i class="fa fa-calendar fa-1x" aria-hidden="true"></i> Ver agenda</a></li>
            <?php if($_SESSION['cod_usuario'] == 1){ ?>
            <li class="list-group-item"><a href="../views/formUsuarios.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Usuario</a></li>
            <?php } ?>
            <li class="list-group-item"><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
          </ul>
        </div>
      </div>
      <?php if(isset($_SESSION[ 'alert-sucesso' ])){ ?>
        <div class="alert alert-success mt-3" role="alert">
          <i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $_SESSION['alert-msg'];?>
        </div>
      <?php }
      unset($_SESSION['alert-sucesso']);
      if(isset($_SESSION['alert-erro'])){ ?>
        <div class="alert alert-secondary mt-3" role="alert">
          <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $_SESSION['alert-msg'];?>
        </div>
      <?php }
      unset($_SESSION['alert-erro']);?>
      <hr>
    </div>
  </body>
  </html>
