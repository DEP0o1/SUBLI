<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/leitor.css">
    <script type="module" src="js/componentesJS/acesso.js"></script>
</head>
<body class="bodyLogin">

<div class="logoLogin">
 <img src="img/subli.logoCorClara.png" alt="" />   
</div>

<div class="containerLogin">
    <form class="FormLogin">
        <p>
            <label for="txtEmail">Email:</label>
            <input type="text" name="txtEmail" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </p>
        <p>
            <label for="txtSenha">Senha:</label>
            <input type="password" name="txtSenha" id="txtSenha" placeholder="Informe sua Senha">
        </p>
        <p class="areaBotao">
            <button class="btnRosa" id="btnEntrar" >Entrar</button>
        </p>

    </form>
</div>
</body>

</html>