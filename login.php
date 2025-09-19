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
<<<<<<< HEAD
<body>

<div class="logoLogin">
 <img src="img/subli.png" alt="" />   
</div>
=======
<body class="bodyLogin">
    <?php
    //  include 'complementos/headerLeitor.php'; 
    ?>
>>>>>>> c7580ee1f4569dbf93345222ec67bf93f0fb6c55

<div class="containerLogin">

    <form class="FormLogin">
        <div class="logoLogin">
            <img src="img/subli.png" alt="" />   
        </div>

        <h1>Faça seu Login!</h1>

        <hr>

        <div>
            <label for="txtEmail">Email:</label>
            <input type="text" name="txtEmail" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </div>

        <div>
            <label for="txtSenha">Senha:</label>
            <input type="password" name="txtSenha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBotao">
            <button class="btnRosa" id="btnEntrar" >Entrar</button>
        </div>

        <hr>

        <div class="cadastre-se">
           <p> Ainda não possui uma conta?</p> 
           <a href="Lresultado.php"><h2>Cadastre-se</h2></a>
        </div>

    </form>
</div>
</body>

</html>