<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epréstimos</title>
    <link rel="stylesheet" href="../css/bibliotecario.css">
    <link rel="stylesheet" href="../css/pesquisaBibliotecario.css">
    <link rel="stylesheet" href="../css/homeBibliotecario.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <script src="../js/componentesJS/header.js"></script>
    
  <?php
    require_once 'headerBibliotecario.php';
  ?>

</head>
<body>
        <div class="areaCadastro">
        
        <form action="" class="formAvancado">
            <div >
                <h1 class="pesquisaAvancada">Registrar Empréstimo- O Pequeno Príncipe </h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <h3 class="tituloForm">Código do Leitor:</h3>
                <input type="text" class="inputForm" placeholder="123456"> 
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Nome do Leitor:</h3>
                <input type="text" class="inputForm" placeholder="Pedro Mingel">  
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Notas:</h3>
                <input type="text" class="inputForm" placeholder="Pegou na biblioteca da praia/livro esta com a capa rasgada"> 
            </div>

            <div class="areaBtn">
            <button class="btnRosa">Registrar</button>
            </div>
            </section>
        </form>

    </div>
</body>
</html>