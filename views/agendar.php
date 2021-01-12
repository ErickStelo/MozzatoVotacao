<?php
require '../controllers/verifica-login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MozzatoTV - Agendar de Gravação</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  

  <!-- Meu CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src='https://momentjs.com/downloads/moment.min.js'></script>
</head>
<script>
  $(document).ready(function() {
    var format = 'hh:mm:ss';
    var beforeTime = moment('08:00:00', format);
    var afterTime = moment('18:00:00', format);
    var validInput = {
      data: false,
      hora: false
    };

    var a = moment();
    a = a.format();

    $('#data_gravacao').focusout(function() {
      var setData = $('#data_gravacao').val() + ' 23:59:00';
      if (moment(setData).isBefore(a)) {
        validInput.data = false;
        alert('Data menor que a data atual');
        $('#data_gravacao').val('');
      } else {
        validInput.data = true;
        SendAgenda();
      }
    });

    $('#hora_gravacao').focusout(function() {
      var setHorario = $('#hora_gravacao').val();
      var time = moment(setHorario, format);
      if (!time.isBetween(beforeTime, afterTime)) {
        alert('Horario fora do intervalo! Selecione um horário entre 08:00 e 18:00');
        validInput.hora = false;
        $('#hora_gravacao').val('');
      } else {
        validInput.hora = true;
        SendAgenda();
      }
    });

    function SendAgenda() {
      if (validInput.hora == true && validInput.data == true) {~
        $("#Btnenviar").prop('disabled', false);
      }
    }
  });
</script>

<body>
  <nav class="navbar navbar-light bg-dark">
    <a href="./painel.php" class="navbar-brand">
      <img src="./img/logo.png" width="100px">
    </a>
  </nav>
  <div class="container mt-3 col-sm-6">
    <div class="card" id="formulario-pergunta">
      <div class="card-header">
        <h3>Agendar Gravação</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="../controllers/agenda.php" enctype="multipart/form-data">
          <label id=>Seu Nome/Usuario</label>
          <input type="text" disabled value="<?php echo @$_SESSION['nome_usuario']; ?>" class="form-control" placeholder="Titulo">
          <br>
          <label>Nome do Programa</label>
          <input type="text" name="nome_programa" required class="form-control" placeholder="Titulo">
          <br>
          <label>Roteiro de gravação <span class="text-secondary font-italic">(Formatos aceitos: docx, doc e txt)</span></label>
          <input type="file" name="file_roteiro" required class="form-control" accept=".docx, .doc, .txt">
          <br>
          <label>Data de Gravação</label>
          <input id="data_gravacao" name="data_gravacao" type="date" required class="form-control">
          <br>
          <label>Hora de Gravação</label>
          <input id="hora_gravacao" name="hora_gravacao" type="time" required class="form-control">
          <br>
          <button class="btn btn-success" disabled id="Btnenviar">AGENDAR</button>
          <button class="btn btn-secondary" type="reset">LIMPAR</button>
          <span id='teste'></span>
        </form>
      </div>
    </div>
    <hr>
  </div>
</body>

</html>