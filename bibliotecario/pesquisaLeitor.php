<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pesquisa </title>
    <link rel="stylesheet" href="../css/bibliotecario.css">
    <title>Pesquisa</title>
        <link rel="stylesheet" href="../css/bibliotecario.css">
    <link rel="stylesheet" href="../css/homeBibliotecario.css">
    <link rel="stylesheet" href="../css/pesquisaBibliotecario.css">
    <script src="../js/componentesJS/header.js"></script>
    
    <link rel="shortcut icon" href="../img/pequeno terry.webp" type="image/x-icon">


  <?php
    require_once 'headerBibliotecario.php';
  ?>


</head>

<body>
    <div class="formPesquisa"> 
        <div  class="titulo"> <h1>Encontrar Leitor</h1> </div>
        <form class="form">
            <input type="text" placeholder="Nome do leitor" class="inputForm">
            <input type="text" placeholder="CPF" class="inputForm">
        </form>
        <div class="btnForm">
            <button class="btnRosa">
                Pesquisa
            </button>
            <button class="btnRosa">
                Novo Leitor
            </button>
        </div>
    </div>

    <div class="leitoresEncontrados">
        <div class="leitorEncontrado"> 
            <img src="../img/pequeno terry.webp" alt="" class="leitor">

            <div class="infoLeitor">
            <h2>Terry Crews</h2>

            <a href="emprestimoPesquisa.html">
            <button class="btnAzul">Empréstimos</button>
            </a>    
            </div>

            
        </div>
        <div class="leitorEncontrado"> 
            <img src="../img/pequeno terry.webp" alt="" class="leitor">

            <div class="infoLeitor">
            <h2>Terry Crews</h2>

            <a href="emprestimoPesquisa.html">
            <button class="btnAzul">Empréstimos</button>
            </a>   

            </div>

    </div>

    
</body>
</html>