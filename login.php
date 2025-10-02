<?php
require('config.php');

// $array = [5, 3, 65, 8, 12, 76, 343, 34, 75, 23];

// asort($array);

// foreach ($array as $key) {
//     echo "
//         <h1>{$key}</h1>
//     ";
// }


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
    <script type="module" src="js/componentesJS/acesso.js"></script>
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
            <label for="cd_email">Email:</label>
            <input type="text" name="cd_email" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </div>

        <div>
            <label for="nm_senha">Senha:</label>
            <input type="password" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBotao">
            <button class="btnRosa" id="btnEntrar" >Entrar</button>
        </div>

        <hr>

        <div class="cadastre-se">
           <p> Ainda não possui uma conta?</p> 
           <a href="Lcadastro.php"><h2>Cadastre-se</h2></a>
        </div>

    </form>
</div>
</body>

</html>