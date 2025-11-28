<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUBLI - Solicitação de Evento </title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/header.js"></script>


  <?php
  require_once './complementos/headerLeitor.php';
  ?>
</head>

<body>

      <?php
      $evento = new EventoView;
      $evento->ExibirEventoLeitor(new Evento(null, null, null, null, new Biblioteca(), new Leitor(), true));
      ?>

</body>

</html>