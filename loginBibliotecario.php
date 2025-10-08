<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUBLI - Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="css/mobile.css">
  <script type="module" src="js/componentesJS/acessoBibliotecario.js"></script>
</head>

<body class="bodyLogin">
  <?php
  //  include 'complementos/headerLeitor.php'; 
  ?>

  <div class="containerLogin">

    <form class="FormLogin">
      <div class="logoLogin">
        <img src="img/subli.png" alt="" />
      </div>

      <h1>Faça seu Login!</h1>

      <hr>

      <div>
        <label for="cd_bibliotecario">Código:</label>
        <input type="text" name="cd_bibliotecario" id="txtCodigo" placeholder="Informe seu código" autofocus>
      </div>

      <div>
        <label for="nm_senha">Senha:</label>
        <input type="password" name="nm_senha" id="txtSenha" placeholder="Informe sua senha">
      </div>

      <div class="areaBotao">
        <button class="btnRosa" id="btnEntrar">Entrar</button>
      </div>

    </form>
  </div>
</body>

</html>