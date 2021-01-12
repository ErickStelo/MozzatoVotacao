<?php
include '../controllers/dbconnect.php';
// CONSULTA SE JA ESTA AGENDADO
$queryconsulta = 'Select * from agenda_gravacoes';
$ret = mysqli_query($con, $queryconsulta);
mysqli_close($con);
?>
