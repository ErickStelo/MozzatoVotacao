<?php
require '../controllers/verifica-login.php';
include '../controllers/getAgendas.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MozzatoTV - Consultar Agenda</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src='https://momentjs.com/downloads/moment.min.js'></script>
  <script src="https://use.fontawesome.com/53206850d8.js"></script>



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <!-- Meu CSS -->
  <link rel="stylesheet" href="./css/style.css">
</head>
<script>
  $(document).ready(function() {
    var tabela = $('#tabela-agenda').DataTable();

    $('#findHoje').click(function() {
      var dataatual = moment().format("DD/MM/YYYY");
      tabela.columns('#data').search(dataatual);
      tabela.draw();
    });

    $('#clearFill').click(function() {
      tabela.columns().search('');
      tabela.draw();
    });
  });
</script>

<body>
  <nav class="navbar navbar-light bg-dark">
    <a href="./painel.php" class="navbar-brand">
      <img src="./img/logo.png" width="100px">
    </a>
  </nav>
  <div class="container mt-3">
    <div class="card" id="formulario-pergunta">
      <div class="card-header">
        <h3>Ver agenda</h3>
      </div>
      <div class="card-body">
        <div class="container p-3">
          <div class="row">
            <div class="col">
              Filtro rápido:
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button class="btn btn-outline-secondary btn-sm" id="clearFill">Limpar Filtro</button>
              <button class="btn btn-outline-primary btn-sm" id="findHoje">Hoje</button>
            </div>
          </div>
        </div>
        <table class='table table-responsive' id="tabela-agenda">
          <thead>
            <th>Cod</th>
            <th id="data">Data</th>
            <th id="hora">Hora</th>
            <th>Programa</th>
            <th>Agendado por</th>
            <th>Ações</th>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($ret)) { ?>
              <tr>
                <td><?= $row['agen_codigo'] ?></td>
                <td><?= date("d/m/Y", strtotime(substr($row['agen_datahora'], 0, 10))); ?></td>
                <td><?= substr($row['agen_datahora'], 10, 11) ?></td>
                <td class="col-3"><?= $row['agen_nomeprograma'] ?></td>
                <td class="col-sm"><?= $row['agen_nome'] ?></td>
                <td class="text-center"><?php if ($_SESSION['cod_usuario'] == 1) { ?><a href="../<?= $row['agen_pathroteiro'] ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i></a><?php } ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <hr>
  </div>
</body>

</html>