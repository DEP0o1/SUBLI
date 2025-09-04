<?php

require_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pesquisa </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <title>Pesquisa</title>   
    <script src="js/componentesJS/header.js"></script>
    
    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">


  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>


</head>

<body>
    <div class="formPesquisa"> 
        <div  class="titulo"> <h1>Encontrar Leitor</h1> </div>
        <form class="form">
            <input name="nm_leitor" type="text" placeholder="Nome do leitor" class="inputForm">
            <input name="cd_cpf" type="text" placeholder="CPF" class="inputForm">
            <div class="btnForm">
                <button class="btnRosa">
                    Pesquisa
                </button>
                <button class="btnRosa">
                    Novo Leitor
                </button>
            </div>
        </form>
    </div>
    <div class= "leitoresEncontrados">
    <?php
     $pesquisa_avancada = false;
    if (isset($_REQUEST['cd_cpf']) && $_REQUEST['cd_cpf'] != '' && strlen($_REQUEST['cd_cpf']) == 11) {
        $cd_cpf = $_REQUEST['cd_cpf'];
        $pesquisa_avancada = true;
    } else {
        $cd_cpf = null;
    }

    if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != '') {
        $nm_leitor = $_REQUEST['nm_leitor'];
        $pesquisa_avancada = true;
    } else {
        $nm_leitor = null;
    }

    if($pesquisa_avancada){
        $leitor = new LeitorView;
        $leitor->ExibirLeitores(new Leitor(null,$nm_leitor,$cd_cpf));
    }
?> 
        </div>

    
</body>
</html>